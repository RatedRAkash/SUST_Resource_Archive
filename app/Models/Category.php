<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =[
        'id','category_name','category_description',
    ];

    public function project()
    {
        return $this->hasOne(Project::class);
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
