<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\UserCreated;

class UserDetail extends Model
{
    protected $fillable = ['fullname','email','phone','address','summary'];

    
    protected $dispatchEvents = [
        'created'=> 'UserCreated::class',
    ];
}
