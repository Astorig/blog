<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleChangeCompleted extends Notification
{
    use Queueable;

    public $articleTitle;
    public $typeMessage;
    public $url;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($articleTitle, $typeMessage, $url)
    {
        $this->articleTitle = $articleTitle;
        $this->typeMessage = $typeMessage;
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->articleTitle)
                    ->line('Article ' . $this->articleTitle . ' ' . $this->typeMessage)
                    ->action('Article Link', url($this->url));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
