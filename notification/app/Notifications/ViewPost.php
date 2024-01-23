<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ViewPost extends Notification
{
    use Queueable;
    public $post;
    public $viewer;
    /**
     * Create a new notification instance.
     */
    public function __construct($viewer,$post)
    {
        $this->post=$post;
        $this->viewer=$viewer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'post_id' => $this->post ->id,
            'post_name' => $this->post ->name,
            'viewer_id' => $this->viewer->id,

        ];
    }
}
