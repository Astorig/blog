@component('mail::message')
    <h2>Новые статьи за прошедшую неделю:</h2>
    @foreach($articles as $article)
        <h3><a href="{{ route('article.show', $article->code) }}">{{ $article->title }}</a></h3>
    @endforeach

@component('mail::button', ['url' => '/'])
Перейти на сайт
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
