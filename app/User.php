<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getUrlAttribute()
    {
        return '#';
    }
    public function getAvatarAttribute()
    {
        $email = $this->email;
        $size = 12;
        $default = "https://www.somewhere.com/homestar.jpg";
        $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) )  . "&s=" . $size;
        return $grav_url;
    }
}
//=========================== FIELDS
//=========================== BELONGS
//=========================== MANY TO MANY
//=========================== METHODS
