<?php

namespace App\Http\Controllers;

use App\Models\package;
use App\Models\Product;
use App\Models\rawMaterial;
use Illuminate\Http\Request;

class PackageController extends Controller
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
        $products = Product::all();

        return view('createPackage',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $package = new package();
        $package->package_type = $request->package_type;
        $package->package_id = $request->input('package_id');
        $package->describe = $request->input('describe');

        $package->save();
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = package::findorFail($id); //id only
        //$product = Product::Where('prod_id', $id)->first();
        return view('editPackage', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $package = package::findorFail($id);
        $package->package_type = $request->package_type;
        $package->describe = $request->describe;

        $package->save();
        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        package::findorFail($id)->delete();
        return redirect()->route('dashboard.index');
    }
}
