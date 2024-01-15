<!-- resources/views/components/pagination.blade.php -->

@if ($paginator->hasPages())
    <div class="pagination flex items-center justify-between mt-4">
        <div class="flex items-center">
            <span class="text-sm text-gray-700">
                Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
            </span>
        </div>

        <div class="flex items-center space-x-2">
            @if ($paginator->onFirstPage())
                <span class="mr-2 disabled">&laquo;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="mx-1 disabled">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="mx-1 current">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="mx-1">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            @else
                <span class="ml-2 disabled">&raquo;</span>
            @endif
        </div>
    </div>
@endif
