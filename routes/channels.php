<?php
use App\Models\Group;
use Illuminate\Support\Facades\Broadcast;

// group
Broadcast::channel('group-creation{ownerId}', function ($user , $owner_id) {

    return (int) $user->id === (int) $owner_id;
});
Broadcast::channel('group{groupId}', function ($user , $groupId) {
    $group = Group::find($groupId);
    return $group->members->contains('user_id', $user->id);
});


// private message
Broadcast::channel('private-chat{messageId}', function ($user , $message) {
    return $user->id == $message->user_id || $user->id == $message->receiver_id;
});

// group message
Broadcast::channel('group-chat{groupId}', function ($user, $groupId) {
    return $user->groups->contains($groupId);
});

