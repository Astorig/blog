<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Services\TagsSynchronizer;
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


    public function store(Request $request, Article $article, FormRequest $attributes, TagsSynchronizer $tagsSynchronizer)
    {
        //POST /articles
        $tags = collect(explode(',', $request['tags']));
        $tagsSynchronizer->sync($tags, $article->create($attributes->articleValidate($request, $article)));
        return redirect('/');
    }


    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }


    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }


    public function update(Request $request, Article $article, TagsSynchronizer $tagsSynchronizer)
    {
        //PATCH /articles/{id}
        $attributes = new FormRequest();
        $article->update($attributes->articleValidate($request, $article));

        $tags = collect(explode(',', $request['tags']));

        $tagsSynchronizer->sync($tags, $article);

        return redirect('/');
    }


    public function destroy(Article $article)
    {
        //DELETE /articles/{id}
        $article->delete();

        return redirect('/');
    }
}
