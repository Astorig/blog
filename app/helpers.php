<?php

function sendingAnArticleChangeNotification($article, $typeMessage)
{
    if ($typeMessage == 'destroy') {
        $url = route('welcome');
    } else {
        $url = route('article.show', $article->code);
    }
    $article->user->notify(new \App\Notifications\ArticleChangeCompleted($article->title, $typeMessage, $url));
}
