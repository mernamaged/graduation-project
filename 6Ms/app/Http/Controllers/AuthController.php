<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\contact;
use App\Models\Contract;
use App\Models\contract as ModelsContract;
use App\Models\endProduct;
use App\Models\order;
use App\Models\package;
use App\Models\payment;
use App\Models\Product;
use App\Models\raw;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $endProducts = endProduct::all();
        $products = Product::all();
        $users = User::all();
        $endpros = Product::where('product_type', '=', 'product')->get();
        $lonleys = Product::where('product_type', '=', 'lonely')->get();
        $users0 = User::where('GroupID', '=', '0')->get();
        $orders = order::all();
        $payments = payment::all();
        $carts = cart::all();
        $contracts = Contract::all();

        $search = $request->search;
        $endpros= Product::where('p_name','like',"%$search%")->where('product_type', '=', 'product')->get();
        $lonleys= Product::where('p_name','like',"%$search%")->where('product_type', '=', 'lonely')->get();
        return view('authencate', compact('endProducts','contracts', 'users0','users', 'carts', 'payments', 'endpros', 'lonleys', 'orders', 'products'));
    }

}
