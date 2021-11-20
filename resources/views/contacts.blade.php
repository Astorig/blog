@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Форма обратной связи
        </h3>
        @include('layout.errors')

        <form action="/contacts" method="post">
            @csrf

            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email для связи</label>
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Введите ваш email">
            </div>
            <div class="mb-3">
                <label for="inputMessage" class="form-label">Сообщение</label>
                <textarea name="message" class="form-control" id="inputMessage" placeholder="Оставьте своё сообщение"></textarea>
            </div>
            <button name="send" type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
