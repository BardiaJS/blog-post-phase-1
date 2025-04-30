<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;

class UserController extends Controller
{
    // Register the user
    public function register(UserRegisterRequest $userRegisterRequest){
        $validated = $userRegisterRequest->validated();
        if(($this->check_phone_number($validated['phone_number'])) && ($this->check_age($validated['age']))){
            $validated['password'] = Hash::make($validated['password']);
            $user = User::create($validated);
            return response()->json([
                'message' => 'User Created Successfully!',
                'user'=> new UserResource($user)
            ]);
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
        }

    }
    function check_phone_number($phoneNumber) {
        // Regular expression for Iranian mobile numbers
        $pattern = '/^09[0-9]{9}$/';

        // Check if the phone number matches the pattern
        return preg_match($pattern, $phoneNumber) === 1;
    }

    function check_age($age){
        if($age >= 18){
            return true;
        }else{
            return false;
        }
    }
}
