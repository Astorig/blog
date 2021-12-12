<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function index()
    {
        $articlesIsPublished = Cache::tags(['articles', 'articlesIsPublished'])->remember('users_articles|' . auth()->id(), 3600, function () {
            return Article::with('tags')->latest()->where('published', '1')->simplePaginate(10);
        });

        $articlesIsNotPublished = Cache::tags(['articles', 'articlesIsNotPublished'])->remember('users_articles|' . auth()->id(), 3600, function () {
            return Article::with('tags')->latest()->where('published', '0')->get();
        });

        return view('welcome', compact('articlesIsPublished', 'articlesIsNotPublished'));
    }
}
