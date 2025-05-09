<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'created_time'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->created_time = Carbon::now()->format('Y-m-d H:i:s');
        });
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class , 'user_id');
    }
    public function comments():HasMany{
        return $this->hasMany(Comment::class , 'post_id');
    }
}
