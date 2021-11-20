<?php

namespace App\Http\Controllers;

use App\Models\Articles;
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


    public function store(Request $request)
    {
        //POST /articles
        $this->validate($request, [
           'code' => 'required|alpha_dash|unique:articles,code',
            'title' => 'required|between:5,100',
            'description' => 'required|max:255',
            'content' => 'required'
        ]);

        Articles::create($request->all());

        return redirect('/');
    }


    public function show(Articles $article)
    {
        return view('articles.show', compact('article'));
    }


    public function edit($id)
    {
        //GET /articles/{id}/edit
    }


    public function update(Request $request, $id)
    {
        //PATCH /articles/{id}
    }


    public function destroy($id)
    {
        //DELETE /articles/{id}
    }
}
