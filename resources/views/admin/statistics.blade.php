@extends('layout.without_sidebar')

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">Общее количество статей : {{ $resultStatistics['articlesCount'] }}</h2>
    </div>
    <div class="blog-post">
        <h2 class="blog-post-title">Общее количество новостей : {{ $resultStatistics['newsCount'] }}</h2>
    </div>
    <div class="blog-post">
        <h2 class="blog-post-title">Самый активный автор : {{ $resultStatistics['mostActiveAuthor']->name }}</h2>
    </div>
    <div class="blog-post">
        <h2 class="blog-post-title">
            <a href="/articles/{{ $resultStatistics['longestArticle']->code }}">
                Самая длинная статья : {{ $resultStatistics['longestArticle']->title }}
            </a>
            <p class="blog-post-meta">Длина статьи: {{ $resultStatistics['longestArticle']->length_content }}</p>
        </h2>
    </div>
    <div class="blog-post">
        <h2 class="blog-post-title">
            <a href="/articles/{{ $resultStatistics['shortestArticle']->code }}">
                Самая короткая статья : {{ $resultStatistics['shortestArticle']->title }}
            </a>
            <p class="blog-post-meta">Длина статьи: {{ $resultStatistics['shortestArticle']->length_content }}</p>
        </h2>
    </div>
    <div class="blog-post">
        <h2 class="blog-post-title">Среднее количество статей у активных пользователей : {{ $resultStatistics['avgArticlesActiveUsers'] }}</h2>
    </div>
    <div class="blog-post">
        <h2 class="blog-post-title">
            <a href="/articles/{{ $resultStatistics['mostVolatileArticle']->code }}">
                Самая непостоянная статья : {{ $resultStatistics['mostVolatileArticle']->title }}
            </a>
        </h2>
    </div>
    <div class="blog-post">
        <h2 class="blog-post-title">
            <a href="/articles/{{ $resultStatistics['mostDiscussedArticle']->code }}">
                Самая обсуждаемая статья : {{ $resultStatistics['mostDiscussedArticle']->title }}
            </a>
        </h2>
    </div>
@endsection
