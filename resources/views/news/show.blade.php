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
@endsection
