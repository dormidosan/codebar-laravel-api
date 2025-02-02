<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//File for API is codebar.php
Route::prefix('v1')->group(base_path('routes/api/codebar.php'));


