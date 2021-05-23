<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','request_user_id', 'id');//return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
