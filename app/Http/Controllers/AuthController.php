<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register_index()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {

        return view('auth.login');

    }
    public function register(Request $request)
    {

        return view('auth.register');

    }
    public function logout(Request $request)
    {

        return view('auth.login');
    }
}
