<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        return view('register');
    }
    public function registerPost(Request $request)
    {
        $user = new User();
        $user->UserName = $request->UserName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_phone = $request->user_phone;
        $user->GroupID = $request->GroupID;
        $user->user_address = $request->user_address;
        $user->save();
        return redirect('/auth')->with('success', 'register successfully');
    }
    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        $cred = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($cred)) {
            return redirect('/auth')->with('success', 'login success');
        }
        return back()->with('error', 'error email or password');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
