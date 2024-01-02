<?php

use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\Cart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;



//public routes
Route::post('/users', [AuthController::class, 'addUser']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users', [UsersController::class, 'index']);
Route::post('/reset', [AuthController::class, 'resetPassword']);
Route::post('/categories', [CategoryController::class, 'addCategory']);
Route::get('/categories', [ProductController::class, 'getCategories']);
Route::get('/categories/{id}', [CategoryController::class, 'getCategory']);
Route::get('/shops', [ShopController::class, 'getShops']);
Route::post('/shops/add', [ShopController::class, 'createShop']);
Route::post('/upload_image', [Controller::class, 'uploadImage']);
Route::get('/products', [ProductController::class, 'getProducts']);
Route::get('/product/{id}', [ProductController::class, 'getSingleProduct']);
Route::get('/productsAndCat', [ProductController::class, 'showHomeProductAndCategories1']);
Route::get('/cart', [Cart::class, 'getCart']);
Route::post('/cart/add', [Cart::class, 'addToCart']);



Route::post('/products/add', [ProductController::class, 'addProduct']);
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
    Route::post('/categories', [CategoryController::class, 'addCategory']);
    Route::post('/shop', [ShopController::class, 'createShop']);
    Route::put('/shop/{id}', [ShopController::class, 'updateShop']);
    Route::delete('/shop', [ShopController::class, 'deleteShop']);

});
