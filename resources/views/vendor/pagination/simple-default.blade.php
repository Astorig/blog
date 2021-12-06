@if ($paginator->hasPages())
    <nav>
        <nav class="blog-pagination" role="navigation">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="btn btn-outline-secondary disabled" href="">@lang('pagination.previous')</a>
            @else
                <a class="btn btn-outline-primary" href="{{ $paginator->previousPageUrl() }}">@lang('pagination.previous')</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="btn btn-outline-primary" href="{{ $paginator->nextPageUrl() }}">@lang('pagination.next')</a>
            @else
                <a class="btn btn-outline-secondary disabled" href="">@lang('pagination.next')</a>
            @endif
        </nav>
    </nav>
@endif
