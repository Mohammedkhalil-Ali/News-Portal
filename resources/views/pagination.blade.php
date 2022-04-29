
@if ($paginator->hasPages())
    <ul class="pagination justify-content-center mt-2">
       
        @if ($paginator->onFirstPage())
            <li class="disabled page-link"><span><a href=""></a> ← Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"  class="page-link">← Previous</a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled page-link"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active page-link"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}"  class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"  class="page-link">Next →</a></li>
        @else
            <li class="disabled page-link"><span>Next →</span></li>
        @endif
    </ul>
@endif 