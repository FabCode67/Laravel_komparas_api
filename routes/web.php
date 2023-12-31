<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WelcomeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'addUser']); // Add this line
// Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [ProductController::class, 'showHomeProductAndCat' ])->name('welcome');
Route::get('/product/{id}', [ProductController::class, 'showSingleProductPage' ])->name('singleProductPage');
// Route::get('/', [ProductController::class, 'showHomeGategories'])->name('welcome');


