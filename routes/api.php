<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\CustomerController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Define your API routes here

Route::controller(RegisterController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('customers', CustomerController::class);
});


// Route::get('/customers', [CustomerController::class, 'index']);
// Route::get('/customers', [CustomerController::class, 'show']);
// Route::post('/customer', [CustomerController::class, 'create']);
// Route::get('/customer/{id}', [CustomerController::class, 'edit']);
// Route::put('/customer/{id}', [CustomerController::class, 'update']);


Route::get('/testing', function () {
    return 'This is a test';
});
