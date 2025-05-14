<?php

namespace App\Http\Controllers\Member;

use App\Models\Group;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //
    public function join_group(Group $group){
        if(Auth::user()->members()->group_id != $group->id){
            Member::create([
                'group_id' => $group->id,
                'user_id' => Auth::user()->id
            ]);
            
            return response()->json([
                'message' => 'You joined the group successfully!'
            ]);
        }
    }


    public function leave_group(Group $group){
        $group_id = $group->id;
        Member::where('group_id', $group_id)->delete();
        return response()->json([
            'message' => 'You leaved the group successfully!'
        ]);
    }

    
}
