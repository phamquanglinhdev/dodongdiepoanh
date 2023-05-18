@php
    use App\ViewModels\News\TopNewHomeViewModel;
    /**
    * @var TopNewHomeViewModel $topNewHomeViewModel
     */
@endphp
<div class="row mb-5">
    <div class="col-12 p-lg-3 text text-center h3 text-main ">
        <div class="text-middle">
            <span>TIN TỨC</span>
        </div>
    </div>
    <div class="col-lg-6 col-12 mb-3">
        <div class="px-1 mb-3">
            <div class="h5 text-main fw-bold">
                <i class="fas fa-newspaper"></i>
                <span>Tin tức Đồ đồng Điệp Oanh</span>
            </div>
            <hr>
            @foreach($topNewHomeViewModel->getNormalNews() as $news)
                <div class="new border-bottom mb-2">
                    <div>
                        <span class="fw-light">{{$news->getUpdatedAt()}}</span> -
                        <span class="text-main fw-bold">{{$news->getType()}}</span>
                    </div>
                    <a href="{{route("new",$news->getSlug())}}" class="text-reset fw-semibold">
                        <span>{{$news->getTitle()}}</span>
                    </a>
                </div>
            @endforeach
        </div>
        <a href="{{route("news",0)}}" class="text-reset px-lg-2">Xem tất cả <i class="fas fa-chevron-circle-right"></i></a>
    </div>
    <div class="col-lg-6 col-12 mb-3">
        <div class="px-1 mb-3">
            <div class="h5 text-main fw-bold">
                <i class="fas fa-newspaper"></i>
                <span>Tin tức doanh nghiệp</span>
            </div>
            <hr>
            @foreach($topNewHomeViewModel->getBusinessNews() as $news)
                <div class="new border-bottom mb-2">
                    <div>
                        <span class="fw-light">{{$news->getUpdatedAt()}}</span> -
                        <span class="text-main fw-bold">{{$news->getType()}}</span>
                    </div>
                    <a href="{{route("new",$news->getSlug())}}" class="text-reset fw-semibold">
                        <span>{{$news->getTitle()}}</span>
                    </a>
                </div>
            @endforeach
        </div>
        <a href="{{route("news",1)}}" class="text-reset px-lg-2">Xem tất cả <i class="fas fa-chevron-circle-right"></i></a>
    </div>
</div>
