<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    
    protected $fillable = [
        'chatroom_id',
        'user_id',
        'receiver_id',
        'content',
    ];
    
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->user_id= Auth::user()->id;
        });
    }
    public function scopeMessageWithReceiverId($query , $receiver_id){
        return $query->where('receiver_id', $receiver_id);
    }

}
