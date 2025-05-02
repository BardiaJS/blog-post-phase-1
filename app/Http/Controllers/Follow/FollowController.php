<?php

namespace App\Http\Controllers\Follow;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Follow\FollowResource;

class FollowController extends Controller
{
    public function follow_user(User $user){
        $follow = Follow::create([
            'user_followed_id' => $user->id
        ]);
        return response()->json([
            'message' => 'successfully followed!' ,
            'data' => new FollowResource($follow)
        ]);
    }
    public function unfollow_user(User $user)
{
    Auth::user()->follows()->detach($user->id);
    return response()->json(['message' => 'Unfollowed successfully']);
}
}
