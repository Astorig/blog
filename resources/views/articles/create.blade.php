@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Создание задачи
        </h3>

        @include('layout.errors')

        <form action="/articles" method="post">
            @csrf

            <div class="mb-3">
                <label for="inputCode" class="form-label">Идентификатор статьи</label>
                <input name="code" type="text" class="form-control" id="inputCode" placeholder="Введите уникальный идентификатор">
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Заголовок статьи</label>
                <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Введите заголовок статьи">
            </div>
            <div class="mb-3">
                <label for="inputDescr" class="form-label">Краткое описание статьи</label>
                <input name="description" type="text" class="form-control" id="inputDescr" placeholder="Введите описание статьи">
            </div>
            <div class="mb-3">
                <label for="inputContent" class="form-label">Детальное описание статьи</label>
                <input name="content" type="text" class="form-control" id="inputContent" placeholder="Введите статью">
            </div>
            <div class="mb-3 form-check">
                <input name="published" type="checkbox" class="form-check-input" id="inputPublished" value="1">
                <label class="form-check-label" for="inputPublished">Опубликовано</label>
            </div>
            <button name="send" type="submit" class="btn btn-primary">Опубликовать</button>
        </form>
    </div>
@endsection
