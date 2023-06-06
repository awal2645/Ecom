
@if ($paginator->hasPages())
        @if ($paginator->onFirstPage())

            <a href="#" class="disabled" ><i class="fa fa-long-arrow-left"></i></a>
           
        @else

            <a href="{{ $paginator->previousPageUrl() }}"  rel="prev" aria-label="@lang('pagination.previous')" ><i class="fa fa-long-arrow-left"></i></a>

        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))

            <a class="disabled" aria-disabled="true">{{ $element }}</a>

            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        
                            <a class="active" href="{{$url}}">{{ $page }}</a>
                    
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" ><i class="fa fa-long-arrow-right"></i></a>
        @else
        <a href="#" class="disabled" ><i class="fa fa-long-arrow-right"></i></a>
        @endif

@endif
    

