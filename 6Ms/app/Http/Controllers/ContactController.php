<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function store(Request $request)
    {

        $contact = new contact();
        $contact->contactName =$request->contactName;
        $contact->email =$request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->UserID= auth()->user()->UserID;
        $contact->save();
        return redirect('/auth')->with('success','contact successfully');
    }
}
