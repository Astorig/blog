<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contacts::latest()->get();
        return view('admin.feedback', compact('contacts'));
    }
}
