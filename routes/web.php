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
Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // products
    Route::get('/products', [ProductsController::class, 'index'])->name('dashboard.products');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('dashboard.products.create');
    Route::post('/products/create', [ProductsController::class, 'store'])->name('dashboard.products.store');
    Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('dashboard.products.edit');
    Route::put('/products/{id}', [ProductsController::class, 'update'])->name('dashboard.products.update');
    Route::get('/products/{product}', [ProductsController::class, 'show'])->name('dashboard.products.show');
    Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('dashboard.products.destroy');


    // purchases
    Route::get('/purchases', [PurchasesController::class, 'index'])->name('dashboard.purchases');

    // users
    Route::get('/users', [UsersController::class, 'index'])->name('dashboard.users');
});
