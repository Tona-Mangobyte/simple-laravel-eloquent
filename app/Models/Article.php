<?php

namespace App\Models;

use App\Events\ArticleSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    protected $dispatchesEvents = [
        'saved' => ArticleSaved::class,
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

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    public function publishedArticle() {
        $this->attributes = [
            'published' => 1,
        ];
    }
}
