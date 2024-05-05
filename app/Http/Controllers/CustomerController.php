<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
// use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json(['customers' => $customers], 200);
    }
    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);
            $customers = new Customer();

            $customers->name = $request->name;
            $customers->address = $request->address;
            $customers->email = $request->email;
            $customers->phone = $request->phone;
            $customers->save();
            return response()->json($customers);
            // return response()->json(['message' => "Customer created successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => "Something went wrong"], 500);
        }
    }

    // public function show()
    // {
    //     $customers = Customer::all();
    //     return response()->json($customers);
    // }
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
