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
                    <a href="{{route("new",$news->getSlug())}}" class="text-reset">
                        <div class="row">
                            <div class="col-3">
                                <div class="ratio ratio-16x9">
                                    <img src="{{url($news->getThumbnail())}}" class="w-100" alt="">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="fw-bold h5 text-main">
                                    {{$news->getTitle()}}
                                </div>
                                <div class="fw-light">
                                    {{$news->getDescription()}}
                                </div>
                                <div class="mt-1 fw-lighter">Ngày đăng : {{$news->getUpdatedAt()}}</div>
                            </div>
                        </div>
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
                <span>Báo chí nói gì về Đồ đồng Điệp Oanh</span>
            </div>
            <hr>
            @foreach($topNewHomeViewModel->getBusinessNews() as $news)
                <div class="new border-bottom mb-2">
                    <a href="{{route("new",$news->getSlug())}}" class="text-reset">
                        <div class="row">
                            <div class="col-3">
                                <div class="ratio ratio-16x9">
                                    <img src="{{url($news->getThumbnail())}}" class="w-100" alt="">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="fw-bold h5 text-main">
                                    {{$news->getTitle()}}
                                </div>
                                <div class="fw-light">
                                    {{$news->getDescription()}}
                                </div>
                                <div class="mt-1 fw-lighter">Ngày đăng : {{$news->getUpdatedAt()}}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <a href="{{route("news",1)}}" class="text-reset px-lg-2">Xem tất cả <i class="fas fa-chevron-circle-right"></i></a>
    </div>
</div>
