<?php

use App\Http\Controllers\Chatroom\ChatroomController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Follow\FollowController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\PrivateMessage\PrivateMessageController;
use App\Http\Controllers\User\UserController;
use App\Models\PrivateMessage;
use Illuminate\Support\Facades\Route;

Route::post('/send-private-message/to/user/{user}' , [PrivateMessageController::class , 'send_private_message'])->middleware('auth:sanctum');
Route::patch('/update-private-message/{privateMessage}' , [PrivateMessageController::class , 'edit_private_message'])->middleware('auth:sanctum');
Route::delete('/delete-private-message/{privateMessage}' , [PrivateMessageController::class , 'delete_private_message'])->middleware('auth:sanctum');