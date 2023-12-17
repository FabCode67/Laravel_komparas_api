<?php

use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


//public routes
Route::post('/users', [AuthController::class, 'addUser']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users', [UsersController::class, 'index']);
Route::post('/reset', [AuthController::class, 'resetPassword']);
Route::post('/cat', [CategoryController::class, 'addCategory']);
Route::get('/cat', [CategoryController::class, 'getCategories']);
Route::get('/cat/{id}', [CategoryController::class, 'getCategory']);
Route::get('/shop', [ShopController::class, 'getShops']);
Route::post('/upload_image', [Controller::class, 'uploadImage']);
//logout
Route::post('/logout', [AuthController::class, 'logout']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('users/search/{name}', [UsersController::class, 'search']);
    Route::get('users/{id}', [UsersController::class, 'show']);
    Route::put('users/{id}', [UsersController::class, 'update']);
    Route::delete('users/{id}', [UsersController::class, 'destroy']);
    Route::get('users/search/{name}', [UsersController::class, 'search']);
    Route::get('user/profile', [UsersController::class, 'profile']);
    Route::post('/cat', [CategoryController::class, 'addCategory']);
    Route::post('/shop', [ShopController::class, 'createShop']);
    Route::put('/shop/{id}', [ShopController::class, 'updateShop']);
    Route::delete('/shop', [ShopController::class, 'deleteShop']);

});
