<?php

namespace App\Listeners;

use App\Events\ArticleDestroyed;
use App\Notifications\ArticleChangeCompleted;
use Illuminate\Support\Facades\Cache;

class SendArticleDestroyedNotification
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
     * @param  \App\Events\ArticleDestroyed  $event
     * @return void
     */
    public function handle(ArticleDestroyed $event)
    {
        $event->article->user->notify(new ArticleChangeCompleted($event->article->title, 'destroy', route('welcome')));
        Cache::tags(['articles'])->flush();
    }
}
