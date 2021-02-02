<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class NotifyUserCreated
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        
        $user_data = array('name' => $event->user->name, 'email' => $event->user->email, 'body' =>'Welcome to the CV maker website.Please click the given to activate your account.');
        Mail::send('emails.mail', $user_data, function($message) use ($user_data){
            $message->to($user_data['email'])
                    ->subject('Acount activation link.');
            $message->from('chiranjibi.codewing@gmail.com','Feedback');
        });
    }
}
