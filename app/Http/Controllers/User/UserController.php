<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserUpdatePasswordRequest;
use App\Http\Resources\Post\PostCollection;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Requests\User\UserUpdateProfileRequest;

class UserController extends Controller
{
    // Register the user
    public function register(UserRegisterRequest $userRegisterRequest){
        $validated = $userRegisterRequest->validated();
        if(($this->check_phone_number($validated['phone_number']))){
            $validated['password'] = Hash::make($validated['password']);
            $user = User::create($validated);
            return response()->json([
                'message' => 'User Created Successfully!',
                'user'=> new UserResource($user)
            ]);
        }else{
            abort(403 , "Phone number isn't valid!");
        }
    }

    // Login the user
    public function login(UserLoginRequest $userLoginRequest){
        $validated = $userLoginRequest->validated();
        if (Auth::attempt($validated)){
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }else{
            abort(402 , "invalid data input!");
        }

    }

    // Change the user profile
    public function update_profile(UserUpdateProfileRequest $userUpdateProfileRequest , User $user){
        $validated = $userUpdateProfileRequest->validated();
        if(request()->has('phone_number')){
            if(($this->check_phone_number($validated['phone_number']))){
                $user->update($validated);
                return response()->json([
                    'message' => 'updated successfully' ,
                    'user' => new UserResource($user)
                ]);
            }else{
                abort(403 , "Phone number isn't valid!");
            }
        }else{
            $user->update($validated);
            return response()->json([
                'message' => 'updated successfully' ,
                'user' => new UserResource($user)
            ]);
        }
    }

    public function profile_user(User $user){
        $posts = $user->posts;
        $counts_of_posts = $user->posts()->count();
        return response()->json([
            'user' => $user ,
            'total_posts' => $counts_of_posts,
            'posts' => new PostCollection($posts)
        ]);
    }

    public function logout(Request $request){
            $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'successfully logged out!'
        ]);
    }



    public function update_password(UserUpdatePasswordRequest $userUpdatePasswordRequest , User $user){
        $validated = $userUpdatePasswordRequest->validated();
        $user->update($validated);
        return response()->json([
            'message' => 'Updated Password Successfully' ,
            'user' => new UserResource($user)
        ]);
    }
    function check_phone_number($phoneNumber) {
        // Regular expression for Iranian mobile numbers
        $pattern = '/^09[0-9]{9}$/';

        // Check if the phone number matches the pattern
        return preg_match($pattern, $phoneNumber) === 1;
    }


}
