<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Follow extends Model
{
    //
    protected $fillable = [
        'user_id',
        'user_followed_id'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->user_id= Auth::user()->id;
        });
    }



}
