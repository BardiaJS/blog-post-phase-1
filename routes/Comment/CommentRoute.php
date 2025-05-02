
<?php

use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Follow\FollowController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/store-comment/post/{post}' , [CommentController::class , 'store_comment'])->middleware('auth:sanctum');
Route::put('/edit-comment/{comment}' , [CommentController::class , 'edit_comment'])->middleware('auth:sanctum');
Route::delete('/delete-comment/{comment}' , [CommentController::class , 'delete_comment'])->middleware('auth:sanctum');
