<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);

// register
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/products', [ProductsController::class, 'index'])->middleware('auth')->name('dashboard.products');
Route::get('/purchases', [PurchasesController::class, 'index'])->middleware('auth')->name('dashboard.purchases');
Route::get('/users', [UsersController::class, 'index'])->middleware('auth')->name('dashboard.users');