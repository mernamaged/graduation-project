<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
        return view('createSupplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $supplier = new supplier();
        $supplier->material_type = $request->material_type;
        $supplier->supplier_id = $request->supplier_id;
        $supplier->save();
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = supplier::findorFail($id); //id only
        //$product = Product::Where('prod_id', $id)->first();
        return view('editSupplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier = supplier::findorFail($id);
        $supplier->material_type = $request->material_type;
        $supplier->save();
        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        supplier::findorFail($id)->delete();
        // Product::destroy($id); //momken ta5od aktr mn id
        return redirect()->route('dashboard.index');
    }
}
