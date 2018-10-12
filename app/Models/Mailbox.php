<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Mailbox extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'subject','message',
    ];
}
