@if ($paginator->hasPages())
    <div class="pagination flex text-white">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <p class="disabled p-3"><span class="">&laquo;</span></p>
        @else
            <p class="p-3"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></p>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <p class="disabled p-3 px-0"><span>{{ $element }}</span></p>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <p class="active p-3 text-blue-300"><span >{{ $page }}</span></p>
                    @else
                        <p class="p-3"><a href="{{ $url }}">{{ $page }}</a></p>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <p class="p-3"><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></p>
        @else
            <p class="disabled p-3"><span>&raquo;</span></p>
        @endif
    </div>
@endif
