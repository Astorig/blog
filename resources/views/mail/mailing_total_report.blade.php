@component('mail::message')
    <h2>Итоговый отчёт:</h2>
    @foreach($resultRequest as $key => $item)
        <h3>{{ $key }}: {{ $item }}</h3>
    @endforeach

@component('mail::button', ['url' => '/'])
Перейти на сайт
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
