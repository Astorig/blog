@extends('layout.without_sidebar')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Создание новостей
        </h3>

        @include('layout.errors')

        <form action="/news" method="post">
            @csrf

            @include('layout.newsForm')

            <button type="submit" class="btn btn-primary">Опубликовать</button>
        </form>
    </div>
@endsection
