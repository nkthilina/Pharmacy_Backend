<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/customer', 'CustomerController@create');


// Route::get('/register', [AuthController::class, 'register_index'])->name('register');
// Route::post('/register', AuthController::class, 'register')->name('register');
// Route::get('/login', AuthController::class, 'login_index')->name('login');
// Route::post('/login', AuthController::class, 'login')->name('login');
