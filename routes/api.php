<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\InventoryController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// public routes
Route::post('/auth/login', [UserController::class, 'login']);
Route::post('/auth/register', [UserController::class, 'register']);

// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/logout', [UserController::class, 'logout']);

    // owner routes
    Route::group(['middleware' => ['auth:sanctum', 'role:owner']], function () {
        Route::post('/inventory', [InventoryController::class, 'create']);
        Route::post('/customer', [CustomerController::class, 'create']);
    });

    // cashier routes
    Route::group(['middleware' => ['auth:sanctum', 'role:cashier']], function () {
        Route::put('/inventory_update/{id}', [InventoryController::class, 'update']);
        Route::delete('/inventory_delete/{id}', [InventoryController::class, 'delete']);
    });

    // manager routes
    Route::group(['middleware' => ['auth:sanctum', 'role:manager']], function () {
        Route::put('/customer_update/{id}', [CustomerController::class, 'update']);
        Route::delete('/customer_delete/{id}', [CustomerController::class, 'delete']);
    });

    // inventory routes
    Route::get('/inventories', [InventoryController::class, 'index']);
    Route::get('/inventory/{id}', [InventoryController::class, 'show']);
    // Route::put('/inventory_update/{id}', [InventoryController::class, 'update']);
    // Route::delete('/inventory_delete/{id}', [InventoryController::class, 'delete']);

    // customer routes
    Route::post('/customer', [CustomerController::class, 'create']);
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customer/{id}', [CustomerController::class, 'show']);
});

Route::get('/testing', function () {
    return 'This is a test';
});


// Route::middleware('auth:sanctum')->group(function () {
    //     Route::resource('customers', CustomerController::class);
    //     Route::post('/customer',[CustomerController::class, 'create']);
//     Route::get('/customers', [CustomerController::class, 'index']);
//     Route::get('/customer/{id}',[CustomerController::class, 'show']);
//     Route::put('/customer_update/{id}',[CustomerController::class, 'update']);
//     Route::delete('/customer_delete/{id}',[CustomerController::class, 'delete']);
// });


// Route::get('/customers', [CustomerController::class, 'index']);
// Route::get('/customers', [CustomerController::class, 'show']);
// Route::post('/customer', [CustomerController::class, 'create']);
// Route::get('/customer/{id}', [CustomerController::class, 'edit']);
// Route::put('/customer/{id}', [CustomerController::class, 'update']);
// Route::post('/customer/{id}', [CustomerController::class, 'destroy']);
