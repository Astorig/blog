@extends('layout.without_sidebar')

@section('content')
    <div class="container">
        <h2 class="blog-post-title"><a class="p-2 text-muted" href="{{ route('admin.statistics') }}">Статистика портала</a></h2>
        <h2 class="blog-post-title"><a class="p-2 text-muted" href="{{ route('admin.total') }}">Итоговый отчёт</a></h2>
    </div>
@endsection
