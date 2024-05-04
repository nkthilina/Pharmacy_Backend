<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Define your API routes here

// Route::get('/customer', [CustomerController::class, 'index']);
// Route::post('/customer', [CustomerController::class, 'create']);
Route::post('/customer', 'CustomerController@create');

