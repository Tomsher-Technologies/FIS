@if ($paginator->hasPages())
    <nav class="mt-4 mb-3">
        <ul class="pagination justify-content-center mb-0">


            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.first')">
                    <span class="page-link first" aria-hidden="true">
                        <i class="simple-icon-control-start"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link first" href="{{ \Request::url() }}" rel="prev"
                        aria-label="@lang('pagination.first')">
                        <i class="simple-icon-control-start"></i>
                    </a>
                </li>
            @endif

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled " aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link prev" aria-hidden="true">
                        <i class="simple-icon-arrow-left"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link prev" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">
                        <i class="simple-icon-arrow-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span
                            class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span
                                    class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link next" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">
                        <i class="simple-icon-arrow-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link next" aria-hidden="true">
                        <i class="simple-icon-arrow-right"></i>
                    </span>
                </li>
            @endif

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link last" href="{{ \Request::url() . '?page=' . $paginator->lastPage() }}"
                        rel="last" aria-label="@lang('pagination.last')">
                        <i class="simple-icon-control-end"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.last')">
                    <span class="page-link last" aria-hidden="true">
                        <i class="simple-icon-control-end"></i>
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif