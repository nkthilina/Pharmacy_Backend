<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Define your API routes here

Route::get('/customers', [CustomerController::class, 'index']);
// Route::get('/customers', [CustomerController::class, 'show']);
Route::post('/customer', [CustomerController::class, 'create']);
Route::get('/customer/{id}', [CustomerController::class, 'edit']);
Route::put('/customer/{id}', [CustomerController::class, 'update']);


Route::get('/testing', function () {
    return 'This is a test';
});
