<?php

namespace App\Listeners;

use App\Events\ArticleSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ArticleSavedNotification
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
     * @param  \App\Events\ArticleSaved  $event
     * @return void
     */
    public function handle(ArticleSaved $event)
    {
        Log::info("Article Created Event Fire: ". $event->article->id);
        // print_r($event->article);
    }
}
