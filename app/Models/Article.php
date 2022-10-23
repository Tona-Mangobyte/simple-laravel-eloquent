<?php

namespace App\Models;

use App\Events\ArticleSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class Article extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['title', 'content'];

    protected $casts = [
        'user_id' => 'integer'
    ];

    /*protected $dispatchesEvents = [
        'saved' => ArticleSaved::class,
    ];*/

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    /*protected static function booted()
    {
        static::created(function ($article) {
            Log::info("article create is success ". $article->id);
        });
    }*/
}
