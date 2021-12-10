<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PortalStatistics
{
    public function articlesCount()
    {
        return DB::table('articles')->count();
    }

    public function newsCount()
    {
        return DB::table('news')->count();
    }

    public function mostActiveAuthor()
    {
        return DB::table('articles')
            ->leftJoin('users', 'articles.user_id', '=', 'users.id')
            ->selectRaw('count(*) as article_count, name')->groupBy('name')
            ->orderByDesc('article_count')
            ->first();
    }

    public function lengthArticles()
    {
        return DB::table('articles')
            ->select('code', 'title', DB::raw('length(content) as length_content'))
            ->orderByDesc('length_content')
            ->get();
    }

    public function longestArticle()
    {
        return $this->lengthArticles()->first();
    }

    public function shortestArticle()
    {
        return $this->lengthArticles()->last();
    }

    public function avgArticlesActiveUsers()
    {
        $articlesActiveUsers = DB::table('users')
            ->whereExists(function ($query) {
                $query
                    ->select(DB::raw(1))
                    ->from('articles')
                    ->whereRaw('articles.user_id = users.id')
                ;
            })
            ->leftJoin('articles', 'users.id', '=', 'articles.user_id')
            ->select('name', DB::raw('count(*) as article_count'))
            ->groupBy('name')
            ->get();

        return $articlesActiveUsers->pluck('article_count')->avg();
    }

    public function mostVolatileArticle()
    {
        return DB::table('articles')
            ->rightJoin('article_histories', 'articles.id', '=', 'article_histories.article_id')
            ->select('code', 'title', DB::raw('count(*) as change_count'))
            ->groupBy('code', 'title')
            ->orderByDesc('change_count')
            ->first();
    }

    public function mostDiscussedArticle()
    {
        return DB::table('articles')
            ->rightJoin('comments', 'articles.id', '=', 'comments.commentable_id')
            ->select('code', 'title', DB::raw('count(*) as comment_count'))
            ->groupBy('code', 'title')
            ->orderByDesc('comment_count')
            ->first();
    }

    public function resultPortalStatistics()
    {
        return collect([
            'articlesCount' => $this->articlesCount(),
            'newsCount' => $this->newsCount(),
            'mostActiveAuthor' => $this->mostActiveAuthor(),
            'longestArticle' => $this->longestArticle(),
            'shortestArticle' => $this->shortestArticle(),
            'avgArticlesActiveUsers' => $this->avgArticlesActiveUsers(),
            'mostVolatileArticle' => $this->mostVolatileArticle(),
            'mostDiscussedArticle' => $this->mostDiscussedArticle()
        ]);
    }
}
