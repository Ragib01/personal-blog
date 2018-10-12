<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breaking extends Model
{
    protected $table = 'breaking';

    protected $fillable = [
        'title',
        'status'
    ];
}
