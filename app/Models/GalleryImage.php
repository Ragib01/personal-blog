<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $table = 'gallery_images';

    protected $fillable = [
        'title',
        'image',
        'category_id'

    ];

    public function galleryCategory()
    {
        return $this->belongsTo('App\Models\GalleryCategory', 'category_id');
    }
}
