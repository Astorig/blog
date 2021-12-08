<?php

namespace App\Listeners;

use App\Services\Pushall;

class SendPushallNotification
{
    protected $pushall;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Pushall $pushall)
    {
        $this->pushall = $pushall;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->pushall->send($event->article);
    }
}
