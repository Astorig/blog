<?php

namespace App\Listeners;

use App\Events\ArticleDestroyed;
use App\Notifications\ArticleChangeCompleted;

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
    }
}
