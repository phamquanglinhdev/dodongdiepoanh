@php
    /**
    * @var int $currentPage
    * @var int $totalPage
    */
@endphp
<nav aria-label="Page navigation example">
    <ul class="pagination">
        @if($currentPage>1)
            <li class="page-item"><a class="page-link" href="?page={{$currentPage-1}}">Trang trước</a></li>
        @endif
        @if($currentPage>3)
            <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
            <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="?page=3">3</a></li>
            ...
        @endif

        @if($currentPage>1)
            <li class="page-item"><a class="page-link" href="?page={{$currentPage-1}}">{{$currentPage-1}}</a>
            </li>
        @endif
        <li class="page-item"><a class="page-link active" href="?page={{$currentPage}}">{{$currentPage}}</a></li>
        @if($currentPage<$totalPage)
            <li class="page-item"><a class="page-link" href="?page={{$currentPage+1}}">{{$currentPage+1}}</a>
            </li>
        @endif

        @if($currentPage<$totalPage-2)
            ...
            <li class="page-item"><a class="page-link" href="?page={{$totalPage-2}}">{{$totalPage-2}}</a></li>
            <li class="page-item"><a class="page-link" href="?page={{$totalPage-1}}">{{$totalPage-1}}</a></li>
            <li class="page-item"><a class="page-link" href="?page={{$totalPage}}">{{$totalPage}}</a></li>
        @endif
        @if($currentPage<$totalPage)
            <li class="page-item"><a class="page-link" href="?page={{$currentPage+1}}">Trang sau</a></li>
        @endif
    </ul>
</nav>
