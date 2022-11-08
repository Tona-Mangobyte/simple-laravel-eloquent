<?php

namespace App\Observers;

use App\Models\Article;
use Illuminate\Support\Facades\Log;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        Log::info("article create is success ". $article->id);
    }

    /**
     * Handle the Article "updated" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        Log::info("article update is success ". $article->id);
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        Log::info("article delete is success ". $article->id);
    }

    /**
     * Handle the Article "restored" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        Log::info("article restored is success ". $article->id);
    }

    /**
     * Handle the Article "force deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        Log::info("article forceDeleted is success ". $article->id);
    }

    public function notify(Article $article)
    {
        Log::info("article notified is success ". $article->id);
    }
}
