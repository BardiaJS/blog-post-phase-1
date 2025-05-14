<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrivateMessage extends Model
{
    protected $fillable = [
        'user_id',
        'receiver_id',
        'content',
    ];
    public static function boot()    {
        parent::boot();

        self::creating(function ($model) {
            $model->user_id= Auth::user()->id;
        });
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class , 'user_id');
    }


}
