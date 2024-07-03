<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\contract_raw;
use App\Models\package;
use App\Models\raw;
use App\Models\rawMaterial;
use Illuminate\Http\Request;

class RawController extends Controller
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
        $contracts = Contract::all();
        $packages = package::all();

        return view('createRaw',compact('contracts','packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $raw = new rawMaterial();
        $raw->material_type = $request->material_type;
        $raw->package_id = $request->package_id;
        $image = $request->file('raw_image')->getClientOriginalName();
        $raw->raw_image = $request->file('raw_image')->storeAs('rawImages', $image, 'merna');
        $raw->price_raw = $request->price_raw;
        $raw->save();
        $raws = rawMaterial::all();
        $cont_raw = new contract_raw();
        $cont_raw->contract_id = $request->contract_id;
        foreach ($raws as $raw){$cont_raw->raw_id = $raw->raw_id;}
        $cont_raw->save();

        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $raw = rawMaterial::findorFail($id); //id only
        //$product = Product::Where('prod_id', $id)->first();
        return view('editRaw', compact('raw'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $raw = rawMaterial::findorFail($id);
        $raw->material_type= $request->material_type;
        $image = $request->file('raw_image')->getClientOriginalName();
        $raw->raw_image = $request->file('raw_image')->storeAs('rawImages', $image, 'merna');
        $raw->save();
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
        rawMaterial::findorFail($id)->delete();
        // Product::destroy($id); //momken ta5od aktr mn id
        return redirect()->route('dashboard.index');
    }
}
