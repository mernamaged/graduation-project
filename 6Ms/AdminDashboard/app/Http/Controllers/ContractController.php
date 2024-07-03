<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\contract_raw;
use App\Models\supplier;
use Illuminate\Http\Request;

class ContractController extends Controller
{
        /**
         * Display a listing of the resource.
         */
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $suppliers =  supplier::all();
            return view('createContract' ,compact('suppliers'));
        }
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $contract = new Contract();
            //$cont_raw = new contract_raw();
            $contract->contract_budget = $request->contract_budget;
            $contract->contract_duration = $request->contract_duration;
            $contract->supplier_id = $request->supplier_id;
            $contract->save();

            return redirect()->route('dashboard.index');
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $contract = Contract::find($id);
            return view('contracts.show', compact('contract'));
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $contract = Contract::findorFail($id); //id only
            //$product = Product::Where('prod_id', $id)->first();
            return view('editContract', compact('contract'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $contract = Contract::findorFail($id);
            $contract->contract_budget = $request->contract_budget;
            $contract->contract_duration = $request->contract_duration;

            $contract->save();
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
        public function destroy(string $id )
        {
            Contract::findorFail($id)->delete();
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
