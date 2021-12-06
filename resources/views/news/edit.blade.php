@extends('layout.without_sidebar')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Изменение новости
        </h3>

        @include('layout.errors')

        <form action="/news/{{$news->id}}" method="post">
            @csrf
            @method('PATCH')

            @include('layout.newsForm')

            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>

        <form action="/news/{{$news->id}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
