<?php

use App\Http\Controllers\Chatroom\ChatroomController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Follow\FollowController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
Route::post('/join-group/{group}' , [MemberController::class , 'join_group'])->middleware('auth:sanctum');
Route::delete('/leave-group/{group}' , [MemberController::class , 'leave_group'])->middleware('auth:sanctum');