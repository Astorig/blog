<?php

namespace App\Http\Controllers;

use App\Events\ArticleCreated;
use App\Models\Article;
use App\Models\Tag;
use App\Services\TagsSynchronizer;
use App\Validations\FormRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:update,article')->except(['index', 'show']);
    }

    public function index()
    {
        return view('articles.index');
    }


    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request, Article $article, FormRequest $attributes, TagsSynchronizer $tagsSynchronizer)
    {
        $tags = collect(explode(',', $request['tags']));
        $tagsSynchronizer->sync($tags, $article->create($attributes->articleValidate($request, $article)));
//        event(new ArticleCreated($article));
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
        $attributes = new FormRequest();
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
