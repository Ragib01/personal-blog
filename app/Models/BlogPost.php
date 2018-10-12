<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_posts';

    protected $fillable = [
        'title',
        'description',
        'category_id'
    ];

    public function blogCategory ()
    {
        return $this->belongsTo('App\Models\BlogCategory','category_id');
    }
}
