<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable =[
        'category_id','project_name','project_description', 'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function commentsection()
    {
        return $this->hasMany(CommentSection::class);
    }

    public function projectrequest()
    {
        return $this->hasMany(ProjectRequest::class);
    }

    public function partner()
    {
        return $this->belongsTo('App\User','partner_id', 'id');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\User','supervisor_id', 'id');
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }


}
