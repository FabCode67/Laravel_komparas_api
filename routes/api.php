<?php

use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [UsersController::class, 'index']); 
Route::post('users', [UsersController::class, 'addUser']);
Route::get('users/{id}', [UsersController::class, 'show']);
Route::put('users/{id}', [UsersController::class, 'update']);
Route::delete('users/{id}', [UsersController::class, 'destroy']);
Route::get('users/search/{name}', [UsersController::class,'search']);
Route::get('user/login', [UsersController::class,'login']);
Route::get('user/logout', [UsersController::class,'logout']);
Route::get('user/profile', [UsersController::class,'profile']);
Route::post('/login', [UsersController::class, 'login']);


