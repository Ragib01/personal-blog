<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchPost extends Model
{
    protected $table = 'research_posts';

    protected $fillable = [
        'title',
        'description',
        'category_id'
    ];

    public function researchCategory ()
    {
        return $this->belongsTo('App\Models\ResearchCategory','category_id');
    }
}
