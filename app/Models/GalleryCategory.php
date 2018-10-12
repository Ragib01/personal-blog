<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $table = 'gallery_categories';

    protected $fillable = [
        'title',
        'description'
    ];

    public function galleries()
    {
        return $this->hasMany('App\Models\GalleryImage', 'category_id');
    }
}
