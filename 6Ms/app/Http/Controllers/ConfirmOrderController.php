<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\customer_endProduct;
use App\Models\endcustomer;
use App\Models\endProduct;
use App\Models\investor;
use Session;
use Stripe;

use App\Models\order;
use App\Models\order_product;
use App\Models\order_raw;
use App\Models\package;
use App\Models\package_investor;
use App\Models\payment;
use App\Models\Product;
use App\Models\user_raw;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;

class ConfirmOrderController extends Controller
{
    //table order
    public function store(Request $request)
    {
        $carts = Cart::all();
        $totalPrice = 0;

        foreach ($carts as $data) {
            // Create a new order for each cart item
            $order = new Order();
            $order->p_name = $data->p_name;
            $order->size = $data->size;
            $order->order_quanitity = $data->order_quanitity;
            $order->total_price = $data->total_price;
            $order->ord_price = $data->p_price;
            $order->space_price = $data->space_price;
            $order->product_type = $data->product_type;
            $order->UserID = $data->UserID;
            $order->prod_id = $data->prod_id;
            $order->design_img = $request->input('design_img');
            $order->save();

            // Accumulate total price
            $totalPrice += $order->total_price;

            // Handle different product types
            switch ($order->product_type) {
                case 'raw':
                    $order_raw = new order_raw();
                    $order_raw->order_id = $order->order_id;
                    $order_raw->raw_id = $data->prod_id;
                    $order_raw->save();
                    // Create endcustomer if not already created
                    $customer = EndCustomer::firstOrNew(['customer_id' => auth()->user()->UserID]);
                    $customer->save();

                    // Create user_raw relation
                    $raw_user = new user_raw();
                    $raw_user->raw_id = $data->prod_id;
                    $raw_user->customer_id = auth()->user()->UserID;
                    $raw_user->save();

                    // Delete cart item
                    $cart = Cart::where('product_type', 'raw')->firstOrFail();
                    $cart->delete();
                    break;

                case 'package':
                    $ord_pro = new order_product();
                    $ord_pro->order_id = $order->order_id;
                    $ord_pro->prod_id = $data->prod_id;
                    $ord_pro->save();
                    // Create investor if not already created
                    $investor = Investor::firstOrNew(['investor_id' => auth()->user()->UserID]);
                    $investor->save();

                    // Create package_investor relation
                    $investorpack = new package_investor();
                    $investorpack->investor_id = auth()->user()->UserID;
                    $investorpack->package_id = $data->prod_id;
                    $investorpack->save();

                    // Delete cart item
                    $cart = Cart::where('product_type', 'package')->firstOrFail();
                    $cart->delete();
                    break;

                case 'product':
                case 'lonely':
                    $ord_pro = new order_product();
                    $ord_pro->order_id = $order->order_id;
                    $ord_pro->prod_id = $data->prod_id;
                    $ord_pro->save();
                    // Create endcustomer if not already created
                    $customer = EndCustomer::firstOrNew(['customer_id' => auth()->user()->UserID]);
                    $customer->save();

                    // Create customer_endProduct relation
                    $cus = new customer_endProduct();
                    $cus->customer_id = auth()->user()->UserID;
                    $cus->endPro_id = $data->prod_id;
                    $cus->save();


                    $productId = $data->prod_id;
                    $quantityOrdered = $data->order_quanitity; // Assuming this is the correct property name

                    $product = endProduct::findOrFail($productId);

                    // Check if enough stock is available
                    if ($product->stock >= $quantityOrdered) {
                        $product->stock -= $quantityOrdered;
                        $product->save();
                    } else {
                        return redirect()->back()->with('error', 'Insufficient stock available.');
                    }
                    // Delete cart item
                    $cart = Cart::where('product_type', 'product')
                        ->orWhere('product_type', 'lonely')
                        ->firstOrFail();
                    $cart->delete();
                    break;

                default:
                    break;
            }
        }

        // Create payment record
        $payment = new Payment();
        $payment->payment_amount = $totalPrice;
        $payment->order_id = $order->order_id; // Assuming $order->order_id is correctly set
        $payment->payment_method = 'cash on delivery';
        $payment->save();

        return redirect()->route('feedback.index');
    }

    public function stripe($totalPrice)
    {
        return view('stripe', compact('totalPrice'));
    }
    public function stripePost(Request $request, $totalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $totalPrice * 100,
            "currency" => "egp",
            "source" => $request->stripeToken,
            "description" => "thanks"
        ]);

        $carts = Cart::all();
        $totalPrice = 0;

        foreach ($carts as $data) {
            // Create a new order for each cart item
            $order = new Order();
            $order->p_name = $data->p_name;
            $order->size = $data->size;
            $order->order_quanitity = $data->order_quanitity;
            $order->total_price = $data->total_price;
            $order->ord_price = $data->p_price;
            $order->space_price = $data->space_price;
            $order->product_type = $data->product_type;
            $order->UserID = $data->UserID;
            $order->prod_id = $data->prod_id;
            $order->design_img = $request->input('design_img');
            $order->save();

            // Accumulate total price
            $totalPrice += $order->total_price;

            // Handle different product types
            switch ($order->product_type) {
                case 'raw':
                    $order_raw = new order_raw();
                    $order_raw->order_id = $order->order_id;
                    $order_raw->raw_id = $data->prod_id;
                    $order_raw->save();
                    // Create endcustomer if not already created
                    $customer = EndCustomer::firstOrNew(['customer_id' => auth()->user()->UserID]);
                    $customer->save();

                    // Create user_raw relation
                    $raw_user = new user_raw();
                    $raw_user->raw_id = $data->prod_id;
                    $raw_user->customer_id = auth()->user()->UserID;
                    $raw_user->save();

                    // Delete cart item
                    $cart = Cart::where('product_type', 'raw')->firstOrFail();
                    $cart->delete();
                    break;

                case 'package':
                    $ord_pro = new order_product();
                    $ord_pro->order_id = $order->order_id;
                    $ord_pro->prod_id = $data->prod_id;
                    $ord_pro->save();
                    // Create investor if not already created
                    $investor = Investor::firstOrNew(['investor_id' => auth()->user()->UserID]);
                    $investor->save();

                    // Create package_investor relation
                    $investorpack = new package_investor();
                    $investorpack->investor_id = auth()->user()->UserID;
                    $investorpack->package_id = $data->prod_id;
                    $investorpack->save();

                    // Delete cart item
                    $cart = Cart::where('product_type', 'package')->firstOrFail();
                    $cart->delete();
                    break;

                case 'product':
                case 'lonely':
                    $ord_pro = new order_product();
                    $ord_pro->order_id = $order->order_id;
                    $ord_pro->prod_id = $data->prod_id;
                    $ord_pro->save();
                    // Create endcustomer if not already created
                    $customer = EndCustomer::firstOrNew(['customer_id' => auth()->user()->UserID]);
                    $customer->save();

                    // Create customer_endProduct relation
                    $cus = new customer_endProduct();
                    $cus->customer_id = auth()->user()->UserID;
                    $cus->endPro_id = $data->prod_id;
                    $cus->save();


                    $productId = $data->prod_id;
                    $quantityOrdered = $data->order_quanitity; // Assuming this is the correct property name

                    $product = endProduct::findOrFail($productId);

                    // Check if enough stock is available
                    if ($product->stock >= $quantityOrdered) {
                        $product->stock -= $quantityOrdered;
                        $product->save();
                    } else {
                        return redirect()->back()->with('error', 'Insufficient stock available.');
                    }
                    // Delete cart item
                    $cart = Cart::where('product_type', 'product')
                        ->orWhere('product_type', 'lonely')
                        ->firstOrFail();
                    $cart->delete();
                    break;

                default:
                    break;
            }
        }
        // Create payment record
        $payment = new Payment();
        $payment->payment_amount = $totalPrice;
        $payment->order_id = $order->order_id; // Assuming $order->order_id is correctly set
        $payment->payment_method = 'card payment';
        $payment->save();
        return redirect()->route('feedback.index');
    }
}
