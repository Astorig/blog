<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts');
    }

    public function store()
    {
        $this->validate(\request(), [
           'email' => 'required',
           'message' => 'required'
        ]);

        Contact::create(\request()->all());

//        Contact::create([
//            'email' => request('email'),
//            'message' => request('message')
//        ]);

//        $contacts = new Contact();
//        $contacts->email = \request('email');
//        $contacts->message = \request('message');
//
//        $contacts->save();

        return redirect('/contacts');
    }
}
