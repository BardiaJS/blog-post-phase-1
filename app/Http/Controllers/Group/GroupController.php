<?php

namespace App\Http\Controllers\Group;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Events\Group\GroupCreated;
use App\Events\Group\GroupDeleted;
use App\Events\Group\GroupUpdated;
use App\Events\Group\UserAdded;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Bus\UpdatedBatchJobCounts;
use App\Http\Resources\Group\GroupResource;
use App\Http\Requests\Group\CreateGroupRequest;
use App\Http\Requests\Group\UpdateGroupeRequest;
use App\Models\Member;

class GroupController extends Controller
{
    //
    public function create_group(CreateGroupRequest $createGroupRequest){
        $validated = $createGroupRequest->validated();
        $validated['owner_id'] = Auth::user()->id;
        $group = Group::create($validated);
        
        return new GroupResource($group);
    }

    public function delete_group(Group $group){
        broadcast(new GroupDeleted($group->id));
        $group->delete();
        event(new GroupCreated($group));

        return new GroupResource($group);
    }

    public function edit_group(UpdateGroupeRequest $updateGroupeRequest , Group $group){
        $validated = $updateGroupeRequest->validated();
        broadcast(new GroupUpdated($group));
        $group->update($validated);

        return new GroupResource($group);
    }

    public function add_member(User $user , Group $group){
        if(Auth::user()->id == $group->owner_id){
            $user_id = $user->id;
            $group_id = $group->id;
            $validated ['group_id'] = $group_id;
            $validated ['user_id'] = $user_id;
            broadcast(new UserAdded($group , $user));
            Member::create($validated);
            
        }
    }
}
