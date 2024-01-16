<?php

use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\WishLists;
use App\Http\Controllers\Api\Cart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardUsers;
use App\Http\Controllers\DashboardShops;



Route::post('/users', [AuthController::class, 'addUser']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboardUsers', [DashboardUsers::class, 'showAllUsers']);
Route::post('/reset', [AuthController::class, 'resetPassword']);
Route::post('/categories', [CategoryController::class, 'addCategory']);
Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/categories/{id}', [CategoryController::class, 'getCategory']);
Route::get('/shops', [ShopController::class, 'getShops']);
Route::delete('/shops/{id}', [ShopController::class, 'deleteShop']);
Route::post('/shops/add', [ShopController::class, 'createShop']);
Route::post('/upload_image', [Controller::class, 'uploadImage']);
Route::get('/products', [ProductController::class, 'getProducts']);
Route::get('/product/{id}', [ProductController::class, 'getSingleProduct']);
Route::get('/productsAndCat', [ProductController::class, 'showHomeProductAndCategories1']);
Route::get('/cart', [Cart::class, 'getCart']);
Route::post('/cart/add', [Cart::class, 'addToCart']);
Route::get('/wishLists', [WishLists::class, 'getWishLists']);
Route::post('/wishLists/add', [WishLists::class, 'addToWishLists']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::get('/products/category/{id}', [ProductController::class, 'getProductsByCategory']);
Route::get('/products/shop/{id}', [ProductController::class, 'getProductsByShop']);
Route::delete('/products/{id}', [ProductController::class, 'deleteProduct']);
Route::delete('/categories/{id}', [ProductController::class, 'deleteCategory']);

Route::get('/products/category/{id}/shop/{shop_id}', [ProductController::class, 'getProductsByCategoryAndShop']);
Route::post('/products/add', [ProductController::class, 'addProduct']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::delete('users/{id}', [UsersController::class, 'destroy']);
Route::get('/dashboardShops', [DashboardShops::class, 'showAllShops']);
Route::delete('users/{id}', [UsersController::class, 'destroy']);


//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('users/search/{name}', [UsersController::class, 'search']);
    Route::get('users/{id}', [UsersController::class, 'show']);
    Route::put('users/{id}', [UsersController::class, 'update']);
    // Route::delete('users/{id}', [UsersController::class, 'destroy']);
    Route::get('users/search/{name}', [UsersController::class, 'search']);
    Route::get('user/profile', [UsersController::class, 'profile']);
    Route::post('/categories', [CategoryController::class, 'addCategory']);
    Route::post('/shop', [ShopController::class, 'createShop']);
    Route::put('/shop/{id}', [ShopController::class, 'updateShop']);
    Route::delete('/shop', [ShopController::class, 'deleteShop']);

});
