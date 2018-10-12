<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchCategory extends Model
{
    protected $table = 'research_categories';

    protected $fillable = [
        'title',
        'description',
        'image'

    ];
}
