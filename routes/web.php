<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::middleware(['auth:sanctum'])->post('/broadcasting/auth', function (Request $request) {
    return response()->json([
        'channel_name' => $request->channel_name,
        'authorized' => true
    ]);
});