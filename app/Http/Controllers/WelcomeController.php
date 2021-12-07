<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Article $article)
    {
        $articles = $article->with('tags')->latest()->get();
        return view('welcome', compact('articles'));
    }
}
