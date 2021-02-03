<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Hash;

class InvitationController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function edit($token)
    {
        // Look up the invite
        if (!$invitation = Invitation::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            // dd("token mismatch");
            return redirect('/');
        }
        // dd("token match");
        return view('invitation.accept')->with('user',User::find($invitation->user_id));;
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);
        $user->password = Hash::make($request->password);
        $user->active  = 1;
        $user->save();

        $invitations = Invitation::where('user_id',$user->id)->get();
        foreach($invitations as $invite)
        {
            //send notification to the inviter
            Notification::send($invite->invitor, new \App\Notifications\InvitationAccepted($user));
        }
        Invitation::where('user_id',$user->id)->delete();


        Auth::login($user);
        return redirect('/')->with('success', 'Invitation accepted');
    }
}
