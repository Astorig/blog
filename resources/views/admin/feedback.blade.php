@extends('layout.without_sidebar')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Обращения
        </h3>
    </div>
    @foreach($contacts as $contact)
        @include('admin.item')
    @endforeach
@endsection
