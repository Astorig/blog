@extends('layout.without_sidebar')

@section('content')
    <h2 class="pb-3 mb-4 font-italic border-bottom">
        Новости
    </h2>
    @forelse($news as $oneNews)
        <div class="blog-post">
            <h3 class="blog-post-title"><a href="/news/{{$oneNews->id}}">{{$oneNews->title}}</a></h3>
            <p class="blog-post-meta">{{$oneNews->created_at->format('d.m.Y H:i:s')}}</p>
            {{$oneNews->description}}
        </div>
    @empty
        <p>Пока нет никаких новостей</p>
    @endforelse

    {{ $news->links() }}
@endsection
