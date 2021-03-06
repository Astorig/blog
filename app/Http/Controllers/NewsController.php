<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\TagsSynchronizer;
use App\Validations\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin')->except(['index', 'show']);
    }

    public function index()
    {
        $news = Cache::tags(['news'])->remember('users_news|' . auth()->id(), 3600, function () {
            return News::latest()->simplePaginate(10);
        });

        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request, FormRequest $attributes, News $news, TagsSynchronizer $tagsSynchronizer)
    {
        $tags = collect(explode(',', $request['tags']));

        $newsResult = $news->create($attributes->newsValidate($request));

        $tagsSynchronizer->sync($tags, $newsResult);

        return redirect()->route('news.index');
    }

    public function show(News $news)
    {
        $news = Cache::tags('news')->remember('news|' . $news->id, 3600, function () use ($news) {
            return $news;
        });

        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, FormRequest $attributes, News $news, TagsSynchronizer $tagsSynchronizer)
    {
        $news->update($attributes->newsValidate($request));

        $tags = collect(explode(',', $request['tags']));

        $tagsSynchronizer->sync($tags, $news);

        return redirect()->route('admin.news');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news');
    }
}
