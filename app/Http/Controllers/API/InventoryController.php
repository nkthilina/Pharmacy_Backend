<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;


class InventoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inventory = Inventory::all();
        return response()->json($inventory);
    }

    public function create(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'quantity' => 'required',
            'stock' => 'required',
            'unit' => 'required',
            'price' => 'required',
            'description' => 'required',
            'expiry_date' => 'required',
            'purchase_date' => 'required',
        ]);
        $inventory = new Inventory();
        $inventory->item_name = $request->item_name;
        $inventory->quantity = $request->quantity;
        $inventory->stock = $request->stock;
        $inventory->unit = $request->unit;
        $inventory->price = $request->price;
        $inventory->description = $request->description;
        $inventory->expiry_date = $request->expiry_date;
        $inventory->purchase_date = $request->purchase_date;
        $inventory->save();
        return response()->json($inventory);
    }

    public function show($id)
    {
        $inventory = Inventory::find($id);
        return response()->json($inventory);
    }

    public function update(Request $request, $id)
    {
        $inventory = Inventory::find($id);
        $inventory->item_name = $request->item_name;
        $inventory->quantity = $request->quantity;
        $inventory->stock = $request->stock;
        $inventory->unit = $request->unit;
        $inventory->price = $request->price;
        $inventory->description = $request->description;
        $inventory->expiry_date = $request->expiry_date;
        $inventory->purchase_date = $request->purchase_date;
        $inventory->save();
        return response()->json($inventory);
    }

    public function delete($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return response()->json($inventory);
    }
}
