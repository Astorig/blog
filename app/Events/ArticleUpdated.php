<?php

namespace App\Events;

use App\Models\Article;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ArticleUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $article;
    public $changedColumns;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
        $this->changedColumns = $article->history()->orderByPivot('created_at', 'desc')->first()->pivot->after;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('article');
    }
}
