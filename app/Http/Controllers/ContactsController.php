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

        return redirect('/contacts');
    }
}
