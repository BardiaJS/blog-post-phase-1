<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Group\GroupController;
use App\Http\Controllers\Follow\FollowController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Chatroom\ChatroomController;
use App\Http\Controllers\GroupMessage\GroupMessageController;


Route::post('/send-group-message/to/group/{group}' , [GroupMessageController::class , 'send_group_message'])->middleware('auth:sanctum');
Route::patch('/update-group-message/{groupMessage}' , [GroupMessageController::class , 'edit_group_message'])->middleware('auth:sanctum');
Route::delete('/delete-group-message/{groupMessage}' , [GroupMessageController::class , 'delete_group_message'])->middleware('auth:sanctum');