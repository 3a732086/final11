@if ($paginator->hasPages())
    <div class="text-xl-center">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="w-16 px-2 py-1 rounded border  bg-white  page-item disabled ">第一頁</li>
            @else
                <li class="w-16 px-2 py-1 rounded border  bg-white "><a
                        href="{{ $paginator->previousPageUrl() }}" rel="prev">上一頁</a></li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="w-16 px-2 py-1 rounded border  bg-white  page-item disabled">
                        {{ $element }}</li>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="w-16 px-2 py-1 rounded border  bg-white ">
                                {{ $page }}</li>
                        @else
                            <li class="w-16 px-2 py-1 rounded border  bg-white ">
                                <a  href="{{ $url }}">
                                    {{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="w-16 px-2 py-1 rounded border  bg-white "><a
                        href="{{ $paginator->nextPageUrl() }}" rel="next">下一頁</a></li>
            @else
                <li class="w-16 px-2 py-1 rounded border  bg-white  page-item disabled">最後一頁</li>
            @endif

        </ul>
    </div>
@endif
