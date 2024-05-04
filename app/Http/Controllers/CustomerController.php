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

    public function show()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }
    public function edit($id)
    {

        $customers = Customer::find($id);
        return response()->json($customers);
    }
    public function update(Request $request, $id)
    {

        $customers = Customer::find($id);
        $customers->name = $request->input('name');
        $customers->address = $request->input('address');
        $customers->email = $request->input('email');
        $customers->phone = $request->input('phone');
        $customers->save();
        return response()->json($customers);
    }
}
