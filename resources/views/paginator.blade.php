@if ($paginator->hasPages())
    <nav class="btn-group my-4" role="navigation" aria-label="Pagination navigation">

        @if (!$paginator->onFirstPage())
            <a class="btn btn-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                </svg>
            </a>
        @endif

        @foreach ($elements as $element)

            @if (is_string($element))
                <button class="btn btn-secondary">{{ $element }}</button>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <button class="btn btn-dark">{{ $page }}</button>
                    @else
                        <a class="btn btn-outline-dark" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a class="btn btn-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-right-fill" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                </svg>
            </a>
        @endif

    </nav>
@endif
