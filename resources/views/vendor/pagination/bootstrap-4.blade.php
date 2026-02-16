@if ($paginator->hasPages())

    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    @else
        <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
            @if(app()->getLocale() == 'en')
                <span class="bx bx-chevron-left"></span>
            @else
                <span class="bx bx-chevron-right"></span>
            @endif
        </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="page-numbers current" aria-current="page">{{ $page }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
            @if(app()->getLocale() == 'en')
                <span class="bx bx-chevron-right"></span>
            @else
                <span class="bx bx-chevron-left"></span>
            @endif
        </a>
    @else
    @endif

@endif
