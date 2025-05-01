<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register' , [UserController::class , 'register']);
Route::post('/login' , [UserController::class , 'login']);
Route::patch('/user/{user}/update-profile' , [UserController::class , 'update_profile'])->middleware('auth:sanctum');
Route::put('/user/{user}/update-password' , [UserController::class , 'update_password'])->middleware('auth:sanctum');
Route::get('/profile-user/{user}' , [UserController::class , 'profile_user']);
Route::post('/logout' , [UserController::class , 'logout'])->middleware('auth:sanctum');