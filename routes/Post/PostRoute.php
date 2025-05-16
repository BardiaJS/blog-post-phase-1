<?php

use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/create-post' , [PostController::class , 'create_post'])->middleware('auth:sanctum');
Route::patch('/update-post/{post}' , [PostController::class , 'update_post'])->middleware('auth:sanctum');
Route::get('/all-posts' , [PostController::class , 'get_all_posts']);
Route::get('/single-post/{post}' , [PostController::class , 'get_single_post']);
Route::delete('/delete-post/{post}' , [PostController::class , 'delete_post'])->middleware('auth:sanctum');
Route::get('/post/{post}/comments' , [PostController::class , 'get_comments_of_post'])->middleware('auth:sanctum');
