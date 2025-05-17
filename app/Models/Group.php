<?php

namespace App\Models;

use App\Events\Group\GroupCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    //
    protected $fillable = [
        'owner_id',
        'name',
    ];

    public function members():HasMany{
        return $this->hasMany(Member::class , 'group_id');
    }
    public function groupMessages():HasMany{
        return $this->hasMany(GroupMessage::class , 'group_id');
    }

    protected static function booted()
    {
        static::created(function ($group) {
            Broadcast::event(new GroupCreated($group)); // ارسال رویداد هنگام ایجاد گروه
        });
    }

}
