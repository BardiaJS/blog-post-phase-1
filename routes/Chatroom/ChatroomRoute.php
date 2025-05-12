<?php

use App\Http\Controllers\Chatroom\ChatroomController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Follow\FollowController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
Route::post('/create-private-chatroom/{user}' , [ChatroomController::class , 'create_private_chatroom'])->middleware('auth:sanctum');
Route::post('/create-pulic-chatroom' , [ChatroomController::class , 'create_public_chatroom'])->middleware('auth:sanctum');
Route::post('/add-user/{user}/to-public-chatroom/{chatroom}' , [ChatroomController::class , 'add_user_to_public_chat_room'])->middleware('auth:sanctum');
Route::delete('/delete-chatroom/{chatroom}' , [ChatroomController::class , 'delete_chatroom'])->middleware('auth:sanctum');