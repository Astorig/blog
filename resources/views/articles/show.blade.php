@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Статья
        </h3>
        @can('update', $article)
            <a href="/articles/{{$article->code}}/edit">Изменить</a>
        @endcan
    </div>
    <div class="blog-post">
        <h2 class="blog-post-title">{{$article->title}}</h2>
        <p class="blog-post-meta">{{$article->created_at->format('d.m.Y H:i:s')}}</p>

        @include('layout.tags', ['tags' => $article->tags])

        {{$article->content}}
    </div>
    <a href="/">Вернуться на главную страницу</a>
@endsection
