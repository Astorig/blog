@extends('layout.without_sidebar')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Итоговый отчёт
        </h3>

        <form action="{{ route('admin.store.total') }}" method="post">
            @csrf

            <div class="mb-3 form-check">
                <input name="news" type="checkbox" class="form-check-input" id="inputNews">
                <label class="form-check-label" for="inputNews">Новости</label>
            </div>
            <div class="mb-3 form-check">
                <input name="articles" type="checkbox" class="form-check-input" id="inputArticles">
                <label class="form-check-label" for="inputArticles">Статьи</label>
            </div>
            <div class="mb-3 form-check">
                <input name="comments" type="checkbox" class="form-check-input" id="inputComments">
                <label class="form-check-label" for="inputComments">Комментарии</label>
            </div>
            <div class="mb-3 form-check">
                <input name="tags" type="checkbox" class="form-check-input" id="inputTags">
                <label class="form-check-label" for="inputTags">Тэги</label>
            </div>
            <div class="mb-3 form-check">
                <input name="users" type="checkbox" class="form-check-input" id="inputUsers">
                <label class="form-check-label" for="inputUsers">Пользователи</label>
            </div>

            <button type="submit" class="btn btn-primary">Сгенерировать отчёт</button>
        </form>
    </div>
@endsection
