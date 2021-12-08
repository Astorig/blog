@extends('layout.without_sidebar')

@section('content')
    <div class="container">
        <h2 class="blog-post-title"><a class="p-2 text-muted" href="{{ route('admin.feedback') }}">Обратная связь</a></h2>
        <h2 class="blog-post-title"><a class="p-2 text-muted" href="{{ route('admin.articles') }}">Проверка статей</a></h2>
        <h2 class="blog-post-title"><a class="p-2 text-muted" href="{{ route('admin.news') }}">Управление новостями</a></h2>
    </div>
@endsection
