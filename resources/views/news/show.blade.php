@extends('layout.without_sidebar')

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">{{$news->title}}</h2>
        <p class="blog-post-meta">{{$news->created_at->format('d.m.Y H:i:s')}}</p>

        {{$news->body}}
    </div>
    @admin(Auth::user()->roles)
        <a href="/news/{{$news->id}}/edit">Изменить новость</a>
        <a class="p-2 text-muted" href="/admin/news">Вернуться в раздел редактирования новостей</a>
    @else
        <a href="/news">Вернуться на страницу новостей</a>
    @endadmin

    @auth()
        <form action="/news/{{$news->id}}/comments/" method="post">
            @csrf
            @include('layout.commentForm')
        </form>
    @endauth
    @forelse($news->comments()->latest()->get() as $item)
        <div>
            <p>Автор: {{ $item->user->email }}</p>
            <p>Дата создания: {{ $item->created_at }}</p>
            <p>Комментарий: {{ $item->body }}</p>
            <hr>
        </div>
    @empty
        <p>Нет комментариев</p>
    @endforelse
@endsection
