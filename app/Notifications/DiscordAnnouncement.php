<?php

namespace App\Notifications;

use App\Models\Comic;
use App\Models\ComicChapter;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Webhook\WebhookChannel;
use NotificationChannels\Webhook\WebhookMessage;

class DiscordAnnouncement extends Notification
{
    use Queueable;

    private $chapter;

    /**
     * Create a new notification instance.
     *
     * @param ComicChapter $chapter
     */
    public function __construct(ComicChapter $chapter)
    {
        $this->chapter = $chapter;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WebhookChannel::class];
    }

    /**
     * @param $notifiable
     * @return WebhookMessage
     */
    public function toWebhook($notifiable)
    {
        return WebhookMessage::create()
            ->data([
                'payload' => [
                    'webhook' => $this->chapter->name
                ]
            ]);
    }
}
