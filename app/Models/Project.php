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
}
