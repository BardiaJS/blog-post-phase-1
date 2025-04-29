<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegisterRequest;

class UserController extends Controller
{
    // Register the user
    public function register(UserRegisterRequest $userRegisterRequest){
        $validated = $userRegisterRequest->validated();
        $user = User::create($validated);
        return response()->json([
            'message' => 'User Created Successfully!',
            'user'=> new UserResource($user)
        ]);
    }
}
