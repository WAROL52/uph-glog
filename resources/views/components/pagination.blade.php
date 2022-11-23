@php
    $indexValue=5-$indexPage%5+$indexPage;
    if($indexPage%5==0){
        $indexValue-=5;
    }
    $prev=$indexValue-5;
    $next=$prev+5+1;
@endphp
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @if ($indexPage <= 5)
            <li class="page-item disabled">
                <a class="page-link" href="/post/page/0">Previous</a>
            </li>
        @else
            <li class="page-item ">
                <a class="page-link" href="/post/page/{{ $prev }}">Precedant</a>
            </li>
        @endif
        @for ($i = $prev+1 ; $i < $next; $i++)
            <a @class(["page-link","active"=>$i==$indexPage]) href="/post/page/{{ $i}}">{{ $i}}</a>
        @endfor
        <li class="page-item">
            <a class="page-link" href="/post/page/{{ $next }}">Suivant</a>
        </li>
    </ul>
</nav>
