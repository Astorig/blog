<div class="blog-post">
    <h2 class="blog-post-title">{{$contact->email}}</h2>
    <p class="blog-post-meta">{{$contact->created_at->format('d.m.Y H:i:s')}}</p>

    {{$contact->message}}
</div>
