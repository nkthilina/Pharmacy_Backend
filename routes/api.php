<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\InventoryController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// public routes
Route::post('/auth/login', [UserController::class, 'login'])->name('login');
Route::post('/auth/register', [UserController::class, 'register'])->name('register');

// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/logout', [UserController::class, 'logout'])->name('logout');

    // owner routes
    Route::group(['middleware' => ['auth:sanctum', 'user-access:owner']], function () {
        Route::post('/inventory', [InventoryController::class, 'create'])->name('inventory.create');
        Route::post('/customer', [CustomerController::class, 'create'])->name('customer.create');
    });

    // cashier routes
    Route::group(['middleware' => ['auth:sanctum', 'user-access:cashier']], function () {
        Route::put('/inventory_update/{id}', [InventoryController::class, 'update'])->name('inventory.update');
        Route::delete('/inventory_delete/{id}', [InventoryController::class, 'delete'])->name('inventory.delete');
    });

    // manager routes
    Route::group(['middleware' => ['auth:sanctum', 'user-access:manager']], function () {
        Route::put('/customer_update/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/customer_delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    });

    // inventory routes
    Route::get('/inventories', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/inventory/{id}', [InventoryController::class, 'show'])->name('inventory.show');

    // customer routes
    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');
});


Route::get('/testing', function () {
    return 'This is a test';
});

