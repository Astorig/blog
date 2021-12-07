<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    public function index()
    {
        return view('admin.index');
    }

    public function show(Article $article)
    {
        return view('admin.articles_show', compact('article'));
    }

    public function feedback()
    {
        $contacts = Contact::latest()->get();
        return view('admin.feedback', compact('contacts'));
    }

    public function articles()
    {
        $articles = Article::with('tags')->latest()->get();
        return view('admin.articles', compact('articles'));
    }
}
