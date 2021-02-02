<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public function getLink()
    {
        return route('invitation.accept', $this->token);
    }
    public function invitor()
    {
        return $this->belongsTo(User::class,'invited_id');
    }
}
