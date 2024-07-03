<?php

namespace App\Http\Controllers;
use Session;
use Stripe;
     
use App\Models\Order;
use App\Models\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function stripe($totalPrice){
        return view('stripe',compact('totalPrice'));
    }
}
