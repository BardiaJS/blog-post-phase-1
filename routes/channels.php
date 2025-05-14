<?php
use App\Models\Group;
use Illuminate\Support\Facades\Broadcast;

// group
Broadcast::channel('CreateGroup.{ownerId}', function ($user , $owner_id) {

    return $user->id == $owner_id;
});
Broadcast::channel('group.{groupId}', function ($user , $groupId) {
    $group = Group::find($groupId);

    return $group->members->contains('user_id', $user->id);
});


// private message
Broadcast::channel('chat.{messageId}', function ($user , $message) {
    
    return $user->id == $message->user_id || $user->id == $message->receiver_id;
});
