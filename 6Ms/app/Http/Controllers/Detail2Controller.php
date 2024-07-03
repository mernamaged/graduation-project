<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\customer_endProduct;
use App\Models\endProduct;
use App\Models\order;
use App\Models\package;
use App\Models\payment;
use App\Models\Product;
use App\Models\raw;
use App\Models\User;
use Illuminate\Http\Request;

class Detail2Controller extends Controller
{
    public function index(Request $request)
    {
        $orders = order::all();
        //$packages = package::all();
        $packagespro = Product::where('product_type', '=', 'package')->get();
        $endProducts = endProduct::all();
        //$products = Product::all();
        $products = Product::with('packages', 'rawMaterials')->get();
        $packages = package::with('rawMaterials')->get();
        $carts = cart::all();
        $endpros = Product::where('product_type', '=', 'product')->get();
        $lonleys = Product::where('product_type', '=', 'lonely')->get();
        $orders = order::all();
        $payments = payment::all();
        $users = User::all();
        $search = $request->search;
        $packagespro = Product::where('p_name', 'like', "%$search%")->where('product_type', '=', 'package')->get();
        $raws = raw::where('material_type', 'like', "%$search%")->get();
        return view('detail2', compact(
            'raws',
            'users',
            'carts',
            'packagespro',
            'orders',
            'packages',
            'endProducts',
            'payments',
            'endpros',
            'lonleys',
            'orders',
            'products'
        ));
    }
    public function store(Request $request, $id)
    {
        $product = Product::findorFail($id);
        $raws = raw::findorFail($id);
        $cart = new cart();
        $cart->prod_id = $product->prod_id;
        $cart->prod_id = $raws->raw_id;
        $cart->p_name = $request->input('p_name');
        $cart->size = $request->input('size');
        $cart->cart_img = $request->input('cart_img');
        $cart->design_img = $request->input('design_img');
        $cart->space_price = $request->input('space_price');
        $cart->product_type = $request->input('product_type');
        $cart->order_quanitity = $request->order_quanitity;
        $quantity = $request->order_quanitity;
        $price = $request->input('p_price');
        $space = $cart->space_price;
        $space = floatval($space); // Assuming space price is a decimal number

        // Calculate total price
        $totalPrice = ($quantity * $price) + $space;

        $cart->total_price = $totalPrice;
        $cart->p_price = $request->input('p_price');
        $cart->size = $request->input('size');
        $cart->UserID = auth()->user()->UserID;
        if($request->file('design_img'))
        {
        $image = $request->file('design_img')->getClientOriginalName();
        $cart->design_img = $request->file('design_img')->storeAs('images', $image, 'merna');}
        $cart->save();
        return redirect()->back();
    }
    public function edit(string $id)
    {
    }
    public function update(Request $request, string $id)
    {
        $cart = cart::findorFail($id);
        $cart->order_quanitity = $request->order_quanitity;
        $cart->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        cart::findorFail($id)->delete();
        return redirect()->back();
    }
}
