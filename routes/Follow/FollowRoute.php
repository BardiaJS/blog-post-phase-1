<?php

use App\Http\Controllers\Follow\FollowController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/follow-user/{user}' , [FollowController::class , 'follow_user'])->middleware('auth:sanctum');
Route::delete('/unfollow-user/{user}' , [FollowController::class , 'unfollow_user'])->middleware('auth:sanctum');
Route::get('/get-followers-list' , [FollowController::class , 'get_followers_list'])->middleware('auth:sanctum');
Route::get('/get-following-list' , [FollowController::class , 'get_following_list'])->middleware('auth:sanctum');
