<?php

use App\Http\Controllers\Chatroom\ChatroomController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Follow\FollowController;
use App\Http\Controllers\Group\GroupController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
Route::post('/create-group' , [GroupController::class , 'create_group'])->middleware('auth:sanctum');
Route::delete('/delete-group/{group}' , [GroupController::class ,  'delete_group'])->middleware('auth:sanctum');
Route::patch('/edit-group/{group}' , [GroupController::class , 'edit_group'])->middleware('auth:sanctum');
Route::post('/add-member/user/{user}/to/group/{group}' , [GroupController::class , 'add_member'])->middleware('auth:sanctum');