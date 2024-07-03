<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\endProduct;
use App\Models\order;
use App\Models\Order as ModelsOrder;
use App\Models\order_product;
use App\Models\payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Climate\Order as ClimateOrder;

class OrderController extends Controller
{
    // for cart table
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $product = Product::findorFail($id);

        $cart = new cart();
        $cart->prod_id = $product->prod_id;
        $cart->p_name = $request->input('p_name');
        $cart->size = $request->input('size');
        $cart->cart_img = $request->input('cart_img');
        $cart->product_type = $request->input('product_type');
        $cart->order_quanitity = $request->order_quanitity;
        $quantity = $request->order_quanitity;
        $price = $request->input('p_price');
        $cart->total_price = $quantity * $price;
        $cart->p_price = $request->input('p_price');
        $cart->space_price = $request->input('space_price');
        $cart->design_img = $request->input('design_img');
        $cart->size = $request->input('size');
        $cart->UserID = auth()->user()->UserID;
        $cart->save();
        return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     */
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
