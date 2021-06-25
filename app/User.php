<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function userprofile()
    {
        return $this->hasOne('App\Models\UserProfile');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function project()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function commentsection()
    {
        return $this->hasMany('App\Models\CommentSection');
    }

    public function projectrequest()
    {
        return $this->hasMany('App\Models\ProjectRequest');
    }

    public function favorite()
    {
        return $this->hasMany('App\Models\Favorite'::class);
    }

}
