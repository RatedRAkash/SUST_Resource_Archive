<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id', 'id');
    }
}
