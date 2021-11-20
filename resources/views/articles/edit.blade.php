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

            <div class="mb-3">
                <label for="inputCode" class="form-label">Идентификатор статьи</label>
                <input name="code" type="text" class="form-control" id="inputCode" value="{{old('code', $article->code)}}">
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Заголовок статьи</label>
                <input name="title" type="text" class="form-control" id="inputTitle" value="{{old('title', $article->title)}}">
            </div>
            <div class="mb-3">
                <label for="inputDescr" class="form-label">Краткое описание статьи</label>
                <textarea name="description" class="form-control" id="inputDescr">{{old('description', $article->description)}}</textarea>
            </div>
            <div class="mb-3">
                <label for="inputContent" class="form-label">Детальное описание статьи</label>
                <textarea name="content" class="form-control" id="inputContent">{{old('content', $article->content)}}</textarea>
            </div>
            <div class="mb-3 form-check">
                <input name="published" type="checkbox" class="form-check-input" id="inputPublished" value="1">
                <label class="form-check-label" for="inputPublished">Опубликовано</label>
            </div>
            <button name="send" type="submit" class="btn btn-primary">Изменить</button>
        </form>

        <form action="/articles/{{$article->code}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
