<?php

namespace App\Http\Controllers;

use App\Models\customer_endProduct;
use App\Models\endProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class EndProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $superclasses = Product::all();
        return view('createFinal',compact('superclasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $endProduct = new endProduct();
        $endProduct->endPro_id = $request->input('prod_id');
        $endProduct->stock = $request->input('stock');
        $endProduct->brand_name = $request->input('brand_name');

        $endProduct->save();

        return redirect()->route('dashboard.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $endProduct = endProduct::findorFail($id); //id only
        //$product = Product::Where('prod_id', $id)->first();
        return view('editFinal', compact('endProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $endProduct = endProduct::findorFail($id);
        $endProduct->brand_name = $request->brand_name;
        $endProduct->stock = $request->stock;

        $endProduct->save();
        /* $product->update([
            'p_name'=>$request->p_name,
        ]);
        $product->update(
            $request->all()
        );*/
        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        endProduct::findorFail($id)->delete();
        // Product::destroy($id); //momken ta5od aktr mn id
        return redirect()->route('dashboard.index');
    }
}
