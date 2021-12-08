<?php

namespace App\Http\Controllers;

use App\Models\Article;

class WelcomeController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->latest()->get();
        return view('welcome', compact('articles'));
    }
}
