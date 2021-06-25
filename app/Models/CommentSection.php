<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentSection extends Model
{
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id', 'id');
    }

    public function user_profile()
    {
        return $this->belongsTo(UserProfile::class,'user_id', 'id');
    }
}
