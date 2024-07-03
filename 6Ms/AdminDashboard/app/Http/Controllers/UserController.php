<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\UploadImageTrait;
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
        $user->user_address = $request->user_address;
        $user->save();
        return back()->with('success', 'register successfully');
    }
    public function login()
    {
        return view('LoginAdmin');
    }
    public function loginPost(Request $request)
    {
       //group id
        $cred = [
            'email' => $request->email,
            'password' => $request->password,

        ];
          // Attempt to authenticate the user based on email and password
    if (Auth::attempt($cred)) {
        // Check if the authenticated user has group_id equal to 1
        if (Auth::user()->GroupID == 1) {
            return redirect('/dashboard')->with('success', 'Login successful');
        } else {
            // If the user's group_id is not 1, logout and redirect back
            Auth::logout();
            return redirect()->back()->with('error', 'User does not have access to this dashboard');
        }
    }

    // If authentication fails, redirect back with error message
    return redirect()->back()->with('error', 'Invalid email or password');
}

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return  redirect()->route('login');
    }
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createUser');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->UserName = $request->UserName;
        $user->Email = $request->Email;
        $user->password = Hash::make($request->password);
        $user->GroupID = $request->GroupID;
        $user->user_phone = $request->user_phone;
        $user->user_address = $request->user_address;
        $user->save();
        return redirect()->route('dashboard.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorFail($id); //id only
        return view('editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findorFail($id);
        $user->UserName = $request->UserName;
        $user->Email = $request->Email;
        $user->password = Hash::make($request->password);
        $user->GroupID = $request->GroupID;
        $user->user_phone = $request->user_phone;
        $user->user_address = $request->user_address;
        $user->save();

        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findorFail($id)->delete();
        return redirect()->route('dashboard.index');
    }
}
