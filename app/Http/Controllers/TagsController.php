<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $articlesIsPublished = $tag->articles()->with('tags')->where('published', '1')->simplePaginate(10);
        $news = $tag->news()->with('tags')->get();

        return view('tagsShow', compact('articlesIsPublished', 'news'));
    }
}
