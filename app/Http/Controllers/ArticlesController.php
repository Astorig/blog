<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Services\TagsSynchronizer;
use App\Validations\FormRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:update,article')->only('edit', 'update', 'destroy');
    }

    public function index()
    {
        return view('articles.index');
    }


    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request, Article $article, FormRequest $attributes, TagsSynchronizer $tagsSynchronizer, User $user)
    {
        $tags = collect(explode(',', $request['tags']));

        $articleResult = $article->create($attributes->articleValidate($request, $article));

        $tagsSynchronizer->sync($tags, $articleResult);

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


    public function update(Request $request, Article $article,FormRequest $attributes, TagsSynchronizer $tagsSynchronizer)
    {
        $article->update($attributes->articleValidate($request, $article));

        $tags = collect(explode(',', $request['tags']));

        $tagsSynchronizer->sync($tags, $article);

        return redirect('/');
    }


    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/');
    }
}
