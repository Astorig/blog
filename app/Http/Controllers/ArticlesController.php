<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Validations\FormRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index()
    {
        return view('articles.index'); //GET /articles
    }


    public function create()
    {
        return view('articles.create'); //GET /articles/create
    }


    public function store(Request $request, Articles $article)
    {
        //POST /articles
        $attributes = new FormRequest();
        $article->create($attributes->articleValidate($request, $article));
        return redirect('/');
    }


    public function show(Articles $article)
    {
        return view('articles.show', compact('article'));
    }


    public function edit(Articles $article)
    {
        return view('articles.edit', compact('article'));
    }


    public function update(Request $request, Articles $article)
    {
        //PATCH /articles/{id}
        $attributes = new FormRequest();
        $article->update($attributes->articleValidate($request, $article));
        return redirect('/');
    }


    public function destroy(Articles $article)
    {
        //DELETE /articles/{id}
        $article->delete();

        return redirect('/');
    }
}
