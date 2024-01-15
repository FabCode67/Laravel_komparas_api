<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WelcomeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardProducts;
use App\Http\Controllers\DashboardOrders;
use App\Http\Controllers\DashboardCategories;
use App\Http\Controllers\DashboardUsers;
use App\Http\Controllers\DashboardProfile;
use App\Http\Controllers\DashboardShops;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\ExpensesController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'addUser']); // Add this line
// Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [ProductController::class, 'showHomeProductAndCat' ])->name('welcome');
Route::get('/product/{id}', [ProductController::class, 'showSingleProductPage' ])->name('singleProductPage');
Route::get('/dashboardUsers', [UsersController::class, 'showUsers' ])->name('showUsers');
// Route::get('/', [ProductController::class, 'showHomeGategories'])->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/dashboardProducts', [DashboardProducts::class, 'index'])->name('dashboardProducts');
Route::get('/dashboardOrders', [DashboardOrders::class, 'index'])->name('dashboardOrders');
Route::get('/dashboardCategories', [DashboardCategories::class, 'index'])->name('dashboardCategories');
Route::get('/dashboardUsers', [DashboardUsers::class, 'index'])->name('dashboardUsers');
Route::get('/dashboardProfile', [DashboardProfile::class, 'index'])->name('dashboardProfile');
Route::get('/dashboardShops', [DashboardShops::class, 'index'])->name('dashboardShops');
Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses');
