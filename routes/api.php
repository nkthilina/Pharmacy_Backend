<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\InventoryController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/auth/login', [UserController::class, 'loginUser']);
Route::post('/auth/register', [UserController::class, 'createUser']);

Route::middleware('auth:sanctum')->group(function () {
    // Route::resource('customers', CustomerController::class);
    Route::post('/customer',[CustomerController::class, 'create']);
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customer/{id}',[CustomerController::class, 'show']);
    Route::put('/customer_update/{id}',[CustomerController::class, 'update']);
    Route::delete('/customer_delete/{id}',[CustomerController::class, 'delete']);
});


// Route::get('/customers', [CustomerController::class, 'index']);
// Route::get('/customers', [CustomerController::class, 'show']);
// Route::post('/customer', [CustomerController::class, 'create']);
// Route::get('/customer/{id}', [CustomerController::class, 'edit']);
// Route::put('/customer/{id}', [CustomerController::class, 'update']);
// Route::post('/customer/{id}', [CustomerController::class, 'destroy']);

Route::post('/inventory', [InventoryController::class, 'create']);
Route::get('/inventories', [InventoryController::class, 'index']);
Route::get('/inventory/{id}', [InventoryController::class, 'show']);
Route::put('/inventory_update/{id}', [InventoryController::class,'update']);
Route::delete('/inventory_delete/{id}', [InventoryController::class,'delete']);

Route::get('/testing', function () {
    return 'This is a test';
});
