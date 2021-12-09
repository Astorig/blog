<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\News;
use App\Validations\FormRequest;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function article(Request $request, FormRequest $attributes,Comment $comment, Article $article)
    {
        $comment->create($attributes->commentValidate($request, $article));
        return back();
    }

    public function news(Request $request, FormRequest $attributes,Comment $comment, News $news)
    {
        $comment->create($attributes->commentValidate($request, $news));
        return back();
    }
}
