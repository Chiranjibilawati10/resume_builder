<?php

namespace App;

use App\Education;

use Illuminate\Database\Seeder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_login_at', 'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//user and education relation
    public function education()
    {
        return $this->hasMany(Education::class);
    }
//user and experience relation
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
//user and skill relation
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }
}
