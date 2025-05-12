<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    
    protected $fillable = [
        'chatroom_id',
        'user_id',
        'receiver_id',
        'content',
    ];
}
