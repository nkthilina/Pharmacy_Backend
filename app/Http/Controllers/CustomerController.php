<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // public function index()
    // {
    //     return view('customer.index');
    // }
    public function create(Request $request)
    {
        $customers = new Customer();

        $customers->name = $request->input('name');
        $customers->address = $request->input('address');
        $customers->email = $request->input('email');
        $customers->phone = $request->input('phone');
        
        $customers->save();
        return response()->json($customers);
    }
}
