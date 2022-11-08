<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message'
    ];

    protected $casts = [
        'article_id' => 'integer'
    ];

    public function articleBelongsTo(): BelongsTo {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function articleHasOne(): HasOne {
        return $this->hasOne(Article::class, 'article_id');
    }

}
