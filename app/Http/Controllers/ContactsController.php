<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
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

        Contacts::create(\request()->all());

//        Contacts::create([
//            'email' => request('email'),
//            'message' => request('message')
//        ]);

//        $contacts = new Contacts();
//        $contacts->email = \request('email');
//        $contacts->message = \request('message');
//
//        $contacts->save();

        return redirect('/contacts');
    }
}
