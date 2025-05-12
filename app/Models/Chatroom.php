<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chatroom extends Model
{
    //
    protected $fillable = [
        'user_id',
    ];

    public function user():BelongsTo{
        
        return $this->belongsTo(User::class , 'user_id');
    }
    
    public function messages():HasMany{
        return $this->hasMany(Message::class , 'chatroom_id');
    }


    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->user_id= Auth::user()->id;
        });
    }
}
