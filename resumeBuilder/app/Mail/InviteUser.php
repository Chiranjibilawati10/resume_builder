<?php

namespace App\Mail;

use App\User;
use App\Invitation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteUser extends Mailable
{
    use Queueable, SerializesModels;

    public $invitation;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invitation $invitation, User $user)
    {
        $this->user = $user;
        $this->invitation = $invitation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('chiranjibilawati08@gmail.com')->markdown('emails.accept-invitation');
    }
}
