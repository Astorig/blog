@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Список статей
        </h3>
    </div>
    @forelse($articlesIsPublished as $article)
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="/articles/{{$article->code}}">{{$article->title}}</a></h2>
            <p class="blog-post-meta">{{$article->created_at->format('d.m.Y H:i:s')}}</p>

            @include('layout.tags', ['tags' => $article->tags])

            {{$article->description}}
        </div>
    @empty
        <p>Нет статей с данным тэгом</p>
    @endforelse
    {{ $articlesIsPublished->links() }}

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Список новостей
        </h3>
    </div>
    @forelse($news as $oneNews)
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="/articles/{{$oneNews->code}}">{{$oneNews->title}}</a></h2>
            <p class="blog-post-meta">{{$oneNews->created_at->format('d.m.Y H:i:s')}}</p>

            @include('layout.tags', ['tags' => $oneNews->tags])

            {{$oneNews->description}}
        </div>
    @empty
        <p>Нет новостей с данным тэгом</p>
    @endforelse
@endsection
