@if ($paginator->hasPages())
    <nav aria-label="Page navigation example" aria-label="{{ __('Pagination Navigation') }}">
        
        <ul class="pagination justify-content-end">
            
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        « Trước
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">
                        « Trước
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li  class="page-item disabled">
                                <a class="page-link " href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())

                <li class="page-item disabled">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" >
                        Sau »
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                         Sau »
                    </a>
                </li>
            @endif
        </ul>
        <div class="pagination justify-content-end mr-3">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    Danh sách từ
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    đến
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    trong tổng số
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    kết quả
                </p>
            </div>
        </div>    
    </nav>
    

@endif
