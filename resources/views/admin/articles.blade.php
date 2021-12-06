@extends('layout.without_sidebar')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Список всех статей
        </h3>
    </div>
    @foreach($articles as $article)
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="/admin/articles/{{$article->code}}">{{$article->title}}</a></h2>
            <p class="blog-post-meta">{{$article->created_at->format('d.m.Y H:i:s')}}</p>

            @include('layout.tags', ['tags' => $article->tags])

            {{$article->description}}
        </div>
        {{ $articles->links() }}
    @endforeach
@endsection
