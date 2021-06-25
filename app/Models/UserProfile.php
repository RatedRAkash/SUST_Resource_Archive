<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserProfile extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function commentsection()
    {
        return $this->hasMany('App\Models\CommentSection','id', 'user_id');
    }
}
