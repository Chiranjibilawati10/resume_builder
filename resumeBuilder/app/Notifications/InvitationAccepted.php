<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvitationAccepted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $notifiable->notification_preference;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = route('users.index');
        $subject = $this->user->name.' has accepted your invitation';
        return (new MailMessage)
            ->subject($subject)
            ->markdown('emails.accept-invitation',['url' => $url,'user'=>$notifiable, 'subject'=>$subject]);
    }

    public function toDatabase($notifiable)
    {
        $url = route('users.index');
        $subject = $this->user->name.' has accepted your invitation';
        return [
            'user'=>$this->user->id,
            'content'=>$subject,
            'link'=> $url
        ];
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
