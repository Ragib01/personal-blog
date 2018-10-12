<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPost extends Model
{
    protected $table = 'project_posts';

    protected $fillable = [
        'title',
        'description',
        'category_id'
    ];

    public function projectCategory ()
    {
        return $this->belongsTo('App\Models\ProjectCategory','category_id');
    }
}
