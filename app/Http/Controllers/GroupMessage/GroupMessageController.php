<?php

namespace App\Http\Controllers\GroupMessage;

use App\Events\GroupMessage\GroupMessageDeleted;
use App\Events\GroupMessage\GroupMessageSent;
use App\Events\GroupMessage\GroupMessageUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupMessage\CreateGroupMessageRequest;
use App\Http\Requests\GroupMessage\UpdateGroupMessageRequest;
use App\Http\Resources\GroupMessage\GroupMessageResource;
use App\Models\Group;
use App\Models\GroupMessage;
use Illuminate\Http\Request;

class GroupMessageController extends Controller
{
    public function create_group_message(CreateGroupMessageRequest $createGroupMessageRequest , Group $group){
        $validated = $createGroupMessageRequest->validated();
        $validated['group_id'] = $group->id;
        $groupMessage =GroupMessage::create($validated);
        broadcast(new GroupMessageSent($groupMessage))->toOthers();
        return new GroupMessageResource($groupMessage);
    }

    public function edit_private_message(UpdateGroupMessageRequest $updateGroupMessageRequest , GroupMessage $groupMessage){
        $validated = $updateGroupMessageRequest->validated();
        $groupMessage->update($validated);
        broadcast(new GroupMessageUpdated($groupMessage))->toOthers();

        return new GroupMessageResource($groupMessage);
    }

    public function delete_private_message(GroupMessage $groupMessage){
        broadcast(new GroupMessageDeleted($groupMessage))->toOthers();
        $groupMessage->delete();
    }
}
