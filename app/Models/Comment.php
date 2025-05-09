<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    
    protected $fillable = [
        'user_id',
        'post_id',
        'body',
    ];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->user_id= Auth::user()->id;
        });
        self::creating(function ($model) {
            $model->created_time = Carbon::now()->format('Y-m-d H:i:s');
        });
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class ,'user_id');
    }

    public function post():BelongsTo{
        return $this->belongsTo(Post::class , 'post_id');
    }
}
