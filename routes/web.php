<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Redirect to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes (Only Admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/orders', [OrderController::class, 'adminOrders'])->name('admin.orders');
    Route::patch('/admin/orders/{order}', [OrderController::class, 'updateOrder'])->name('orders.update');
});

// Customer Routes (All Authenticated Users)
Route::middleware(['auth'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');

    // Coffee Management (All Authenticated Users)
    Route::resource('coffees', CoffeeController::class);

    // Order Routes (All Authenticated Users)
    Route::get('/menu', [OrderController::class, 'index'])->name('orders.menu');
    Route::post('/menu', [OrderController::class, 'store'])->name('orders.store');

    // Customer Order History
    Route::get('/my-orders', [OrderController::class, 'customerOrders'])->name('orders.my');
});
