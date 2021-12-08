@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Статья
        </h3>
        @admin(Auth::user()->roles)
        <a class="p-2 text-muted" href="/admin">Админ. раздел</a>
        @else
            @can('update', $article)
                <a href="/articles/{{$article->code}}/edit">Изменить</a>
            @endcan
        @endadmin
    </div>
    <div class="blog-post">
        <h2 class="blog-post-title">{{$article->title}}</h2>
        <p class="blog-post-meta">{{$article->created_at->format('d.m.Y H:i:s')}}</p>

        @include('layout.tags', ['tags' => $article->tags])

        {{$article->content}}
    </div>
    <hr>
    @forelse($article->history as $item)
        <p>{{ $item->email }} - {{ $item->pivot->created_at->diffForHumans() }} - {{ $item->pivot->before }} - {{ $item->pivot->after }}</p>
    @empty
        <p>Нет истории изменений</p>
    @endforelse
    <hr>

    @auth()
    @include('layout.commentForm')
    @endauth

    @forelse($article->comments()->latest()->get() as $item)
        <div>
            <p>Автор: {{ $item->user->email }}</p>
            <p>Дата создания: {{ $item->created_at }}</p>
            <p>Комментарий: {{ $item->body }}</p>
            <hr>
        </div>
    @empty
        <p>Нет комментариев</p>
    @endforelse

    <a href="/">Вернуться на главную страницу</a>
@endsection
