<?php

namespace App\Models;

use App\Events\ArticleNotify;
use App\Events\ArticleSaved;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class Article extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['title', 'content'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'published' => 0,
    ];

    protected $casts = [
        'user_id' => 'integer'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    protected $dispatchesEvents = [
        'saved' => ArticleSaved::class,
        'notify' => ArticleNotify::class,
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($article) {
            Log::info("logging in model article create is success ". $article->id);
        });
    }

    public function scopePublished($query, $arg = 1)
    {
        return $query->where('published', $arg);
    }

    public function publishedArticle() {
        $this->attributes = [
            'published' => 1,
        ];
    }

    /**
     * Get the observable event names.
     *
     * @return array
     */
    public function getObservableEvents()
    {
        return array_merge(
            [
                'retrieved', 'creating', 'created', 'updating', 'updated',
                'saving', 'saved', 'restoring', 'restored', 'replicating',
                'deleting', 'deleted', 'forceDeleted', 'notify',
            ],
            $this->observables
        );
    }

    public function save(array $options = [])
    {
        $save =  parent::save($options);
        $this->fireModelEvent('notify');
        return $save;
    }
}
