@extends('layout.without_sidebar')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Статья
        </h3>
        <a href="/articles/{{$article->code}}/edit">Изменить</a>
    </div>
    <div class="blog-post">
        <h2 class="blog-post-title">{{$article->title}}</h2>
        <p class="blog-post-meta">{{$article->created_at->format('d.m.Y H:i:s')}}</p>

        @include('layout.tags', ['tags' => $article->tags])

        {{$article->content}}
    </div>
    <a href="/admin">Вернуться в Админ. Раздел</a>
@endsection
