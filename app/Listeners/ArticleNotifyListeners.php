<?php

namespace App\Listeners;

use App\Events\ArticleNotify;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ArticleNotifyListeners
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ArticleNotify  $event
     * @return void
     */
    public function handle(ArticleNotify $event)
    {
        Log::info("Article Notified: ". $event->article->id);
    }
}
