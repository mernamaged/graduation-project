<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\brand;
use App\Models\Cart;
use App\Models\contact;
use App\Models\Contract;
use App\Models\contract as ModelsContract;
use App\Models\design;
use App\Models\EndCustomer;
use App\Models\endProduct;
use App\Models\feedback;
use App\Models\investor;
use App\Models\order;
use App\Models\package;
use App\Models\payment;
use App\Models\Product;
use App\Models\rawMaterial;
use App\Models\supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order = order::all();
        $customers = EndCustomer::paginate(4);
        $endProducts = endProduct::paginate(4);
        endProduct::with('superEntity')->get();
        $feedbacks = feedback::paginate(4);
        $contacts = contact::paginate(4);
        $investors = investor::paginate(4);
        $orders = order::paginate(4);
        $packages = package::paginate(4);
        $payments = payment::all();
        $product = Product::all();
        $rawMaterials = rawMaterial::all();
        $suppliers = supplier::paginate(4);
        $users = User::all();
        $usero = User::where('GroupID','=','0');
        $search = $request->search;
        $users= User::where('GroupID','like',"%$search%")
        ->orwhere('UserName','like',"%$search%")->paginate(4);

        $products= Product::where('Product_type','like',"%$search%")->
        orwhere('p_name','like',"%$search%")->paginate(4);

        $contracts= Contract::where('contract_budget','like',"%$search%")->paginate(5);
        $contract= Contract::all();
        $payments= payment::where('payment_amount','like',"%$search%")->paginate(4);
        $rawMaterials= rawMaterial::where('material_type','like',"%$search%")->paginate(4);

        $adminId = auth()->user()->UserID;

        if ($adminId) {
            // Fetch admin details based on admin_id
            $admin = admin::findOrFail($adminId);
            // Additional logic if needed
        }

        // Retrieve other necessary data for the dashboard
        $admins = admin::paginate(4);// Example: Retrieve admins for the dashboard view


        return view('admin', compact('admin','order','contract','product','products','users','search','contacts','contacts','suppliers','packages','investors','endProducts', 'users',
        'contracts','customers', 'feedbacks', 'payments', 'rawMaterials', 'orders', 'admins','usero'));
    }
}
