<?php

namespace App\Listeners;

use App\Events\ArticleCreated;
use App\Notifications\ArticleChangeCompleted;
use Illuminate\Support\Facades\Cache;

class SendArticleCreatedNotification
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
     * @param  \App\Events\ArticleCreated  $event
     * @return void
     */
    public function handle(ArticleCreated $event)
    {
        $event->article->user->notify(new ArticleChangeCompleted($event->article->title, 'create', route('article.show', $event->article->code)));
        Cache::tags(['articles'])->flush();
    }
}
