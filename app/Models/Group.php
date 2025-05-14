<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
