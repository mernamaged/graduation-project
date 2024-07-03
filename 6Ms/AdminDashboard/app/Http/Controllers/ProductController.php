<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use function Laravel\Prompts\progress;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createProd');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->p_name = $request->p_name;
        $product->p_price = $request->p_price;
        $product->product_type = $request->product_type;
        $product->admin_id= auth()->user()->UserID;
        $image = $request->file('endPro_image')->getClientOriginalName();
        $product->endPro_image = $request->file('endPro_image')->storeAs('prodimages', $image, 'merna');
        $product->save();
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findorFail($id); //id only
        //$product = Product::Where('prod_id', $id)->first();
        return view('editProd', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findorFail($id);
        $product->p_name = $request->p_name;
        $product->p_price = $request->p_price;
        $product->product_type = $request->product_type;
        $image = $request->file('endPro_image')->getClientOriginalName();
        $product->endPro_image = $request->file('endPro_image')->storeAs('prodimages', $image, 'merna');
        $product->save();
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
        Product::findorFail($id)->delete();
        // Product::destroy($id); //momken ta5od aktr mn id
        return redirect()->route('dashboard.index');
        /* public function restore($id){
            $products=Product::withTrashed()->where('prod_id',$id)->restore();
            return redirect()->back();
        }
        public function ForceDelete($id){
            $products=Product::withTrashed()->where('prod_id',$id)->forceDelete();
            return redirect()->back();
        }*/
    }
}
