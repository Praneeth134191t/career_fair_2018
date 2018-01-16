@if ($paginator->hasPages())
    <ul class="pagination hidden-xs">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="disabled hidden-xs"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active hidden-xs"><span>{{ $page }}</span></li>
                @else
                    <li class="hidden-xs"><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul>
    <ul class="pager visible-xs">
        @if ($paginator->onFirstPage())
            <li><a class="disabled" href="javascript:void(0)">Previous</a></li>
        @else
            <li><a class="withripple" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
        @endif

        @if ($paginator->hasMorePages())
            <li><a class="withripple" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
        @else
            <li><a class="disabled" href="javascript:void(0)">Next</a></li>
        @endif
    </ul>
@endif