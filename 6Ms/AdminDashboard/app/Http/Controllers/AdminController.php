<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $users= User::all();
        return view('createAdmin',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin = new admin();
        $admin->admin_id = $request->input('UserID');
        $image = $request->file('admin_img')->getClientOriginalName();
        $admin->admin_img = $request->file('admin_img')->storeAs('images', $image, 'merna');
        $admin->save();
        return redirect()->route('dashboard.index',compact('admin'));
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = admin::findorFail($id); //id only
        return view('editAdmin', compact('admin'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = admin::findorFail($id);
        $image = $request->file('admin_img')->getClientOriginalName();
        $admin->admin_img = $request->file('admin_img')->storeAs('images', $image, 'merna');
        $admin->save();

        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        admin::findorFail($id)->delete();
        return redirect()->route('dashboard.index');
    }
}
