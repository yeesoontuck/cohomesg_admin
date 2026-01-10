<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InviteUserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public string $inviteUrl,
        public \Carbon\Carbon $expiresAt
    )
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Invitation to join CoHomeSG CRM')
            ->greeting('Welcome to the team!')
            ->line('You have been invited to join our CRM platform.')
            ->action('Set Up Your Account', $this->inviteUrl) 
            ->line('This link is valid until ' . $this->expiresAt->format('j F Y, g:i a') . '.')
            ->line('Thank you for joining us!')
            ->salutation('Best Regards, CoHomeSG Team');
            
            // ->line('Specifically, you have ' . now()->diffInHours($this->expiresAt) . ' hours remaining to accept.')
            // ->lineIf($this->amount > 1000, 'Thank you for being a premium partner!')
            // ->attachFromStorage($this->receiptPath)
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
