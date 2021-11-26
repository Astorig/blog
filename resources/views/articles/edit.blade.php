@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Изменение задачи
        </h3>

        @include('layout.errors')

        <form action="/articles/{{$article->code}}" method="post">
            @csrf
            @method('PATCH')

            @include('layout.articleForm')

            <button name="send" type="submit" class="btn btn-primary">Изменить</button>
        </form>

        <form action="/articles/{{$article->code}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
