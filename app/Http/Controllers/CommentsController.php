<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Validations\FormRequest;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, FormRequest $attributes,Comment $comment, Article $article)
    {
        $comment->create($attributes->commentValidate($request, $article));
        return back();
    }
}
