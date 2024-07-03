<?php

namespace App\Http\Controllers;

use App\Models\customer_endProduct;
use App\Models\endcustomer;
use App\Models\endProduct;
use App\Models\feedback;
use App\Models\investor;
use App\Models\order;
use App\Models\order_product;
use App\Models\package;
use App\Models\package_investor;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Customer;

class FeedbackController extends Controller
{
    public function index()
    {
        $orders = order::all();
        $packages = package::all();
        $packagespro = Product::where('product_type','=', 'package')->get();
        $endProducts = endProduct::all();
        $orders = order::all();
        $customers = endcustomer::all();
        $investors= investor::all();
        $products= Product::all();
        return view('feedback',compact('packagespro','products','investors','customers',
        'orders','packages','endProducts','orders'));
    }
    public function store(Request $request)
    {
        $feedback = new feedback();

        $feedback->order_id = $request->input('order_id');
        $feedback->rate =$request->rate;
        $feedback->comment =$request->comment;
        $feedback->save();
        return  redirect('/auth')->with('success', 'payment successfully');

    }
}
