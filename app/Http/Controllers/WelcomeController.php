<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $articles = Articles::latest()->get();
        return view('welcome', compact('articles'));
    }
}
