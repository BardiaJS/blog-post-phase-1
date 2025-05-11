<?php

namespace App\Http\Controllers\Follow;

use App\Http\Resources\User\UserCollection;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Follow\FollowResource;

class FollowController extends Controller
{
    // follow the user
    public function follow_user(User $user){
        $follow = Follow::create([
            'user_followed_id' => $user->id
        ]);

        return response()->json([
            'message' => 'successfully followed!' ,
            'data' => new FollowResource($follow)
        ]);
    }

    // unfollow the user
    public function unfollow_user(User $user){
        Auth::user()->follows()->detach($user->id);

        return response()->json(['message' => 'Unfollowed successfully']);
    }

    // get follower list of the user
    public function get_followers_list(User $user){
        $followers_list = $user->followers()->paginate(10);
        
        return response()->json([
            'Follwers List' => new UserCollection($followers_list)
        ]);
    }

    // get following list of the user
    public function get_following_list(User $user){
        $following_list = $user->follows()->paginate(10);

        return response()->json([
            'Following List' => new UserCollection($following_list)
        ]);
    }
}
