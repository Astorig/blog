<?php

namespace App\Listeners;

use App\Events\ArticleUpdated;
use App\Notifications\ArticleChangeCompleted;

class SendArticleUpdatedNotification
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
     * @param  \App\Events\ArticleUpdated  $event
     * @return void
     */
    public function handle(ArticleUpdated $event)
    {
        $event->article->user->notify(new ArticleChangeCompleted($event->article->title, 'update', route('article.show', $event->article->code)));
    }
}
