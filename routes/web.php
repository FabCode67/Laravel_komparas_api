<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WelcomeController;
use App\Http\Controllers\Api\AuthController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'addUser']); // Add this line
