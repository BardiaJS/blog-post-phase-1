<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
    ];

    public function groups():HasMany{
        return $this->hasMany(Group::class);
    }
}
