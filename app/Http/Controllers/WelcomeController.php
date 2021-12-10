<?php

namespace App\Http\Controllers;

use App\Models\Article;

class WelcomeController extends Controller
{
    public function index(Article $article)
    {
        $articlesIsPublished = $article->with('tags')->latest()->where('published', '1')->simplePaginate(10);
        $articlesIsNotPublished = $article->with('tags')->latest()->where('published', '0')->get();

        return view('welcome', compact('articlesIsPublished', 'articlesIsNotPublished'));
    }
}
