<?php
use App\Models\Group;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('CreateGroup.{ownerId}', function ($user , $owner_id) {
    return $user->id == $owner_id;
});

Broadcast::channel('DeleteGroup.{groupId}', function ($user , $groupId) {
    $group = Group::find($groupId); // دریافت گروه بدون Query‌های اضافی
    return $group->members->contains('user_id', $user->id);

});

Broadcast::channel('UpdateGroup.{groupId}', function ($user , $groupId) {
    $group = Group::find($groupId); // دریافت گروه بدون Query‌های اضافی
    return $group->members->contains('user_id', $user->id);
});

Broadcast::channel('AddUser.{groupId}', function ($user , $groupId) {
    $group = Group::find($groupId); // دریافت گروه بدون Query‌های اضافی
    return $group->members->contains('user_id', $user->id);
});