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
        <div class="px-1 mb-3 ">
            <div class="h5 d-lg-block d-none text-main fw-bold">
                <i class="fas fa-newspaper"></i>
                <span class="fw-bold h5 text-uppercase">Tin tức Đồ đồng Điệp Oanh</span>

            </div>
            <div class="d-lg-none d-block bg-main p-3 text-uppercase fw-bold text-white text-center h5">
                Tin tức Đồ đồng Điệp Oanh
            </div>
            <hr>
            <div class="d-lg-block d-none">
                @foreach($topNewHomeViewModel->getNormalNews() as $news)
                    <div class="new border-bottom mb-2">

                        <div class="row">

                            <div class="col-3">
                                <a href="{{$news->getSlug()}}" class="text-reset">
                                    <img src="{{url($news->getThumbnail())}}" class="w-100">
                                </a>
                            </div>
                            <div class="col-9">
                                <div class="fw-bold h5 text-main">
                                    {{$news->getTitle()}}
                                </div>
                                <div class="fw-light">
                                    {{$news->getDescription()}}
                                </div>
                                <div class="mt-1 fw-lighter">
                                    <a class="text-main" href="{{$news->getSlug()}}">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            <div class="d-block d-lg-none">
                <div id="normal" class="carousel slide" data-bs-ride="carousel">
                    <div id="banner" class="carousel slide" data-mdb-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($topNewHomeViewModel->getNormalNews() as $news)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <img src="{{url($news->getThumbnail()??"/")}}" class="d-block w-100"
                                         alt="{{$news->getTitle()}}"/>
                                    <div class="fw-bold h5 text-main">
                                        {{$news->getTitle()}}
                                    </div>
                                    <div class="fw-light">
                                        {{$news->getDescription()}}
                                    </div>
                                    <div class="mt-1 fw-lighter">
                                        <a class="text-main" href="{{$news->getSlug()}}">Xem chi tiết</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-mdb-target="#normal"
                                data-mdb-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-mdb-target="#normal"
                                data-mdb-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route("news",0)}}" class="text-reset px-lg-2">Xem tất cả <i class="fas fa-chevron-circle-right"></i></a>
    </div>
    <div class="col-lg-6 col-12 mb-3">
        <div class="px-1 mb-3">
            <div class="h5 d-lg-block d-none text-main fw-bold">
                <i class="fas fa-newspaper"></i>
                <span class="fw-bold h5 text-uppercase">Báo chí nói gì về chúng tôi</span>

            </div>
            <div class="d-lg-none d-block bg-main p-3 text-uppercase fw-bold text-white text-center h5">
                Báo chí nói gì về chúng tôi
            </div>
            <hr>
            <div class="d-lg-block d-none">
                @foreach($topNewHomeViewModel->getBusinessNews() as $news)
                    <div class="new border-bottom mb-2">
                        <a href="{{$news->getSlug()}}" class="text-reset">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{url($news->getThumbnail())}}" class="w-100">
                                </div>
                                <div class="col-9">
                                    <div class="fw-bold h5 text-main">
                                        {{$news->getTitle()}}
                                    </div>
                                    <div class="fw-light">
                                        {{$news->getDescription()}}
                                    </div>
                                    <div class="mt-1 fw-lighter">Nguồn
                                        : {{\Illuminate\Support\Str::limit($news->getSlug(),20)}}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="d-block d-lg-none">
                <div id="business" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($topNewHomeViewModel->getBusinessNews() as $news)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <div class="new border-bottom mb-2">
                                    <a href="{{$news->getSlug()}}" class="text-reset">
                                        <div class="row">
                                            <div class="col-lg-3 col-12 mb-3 mb-lg-0">
                                                <img src="{{url($news->getThumbnail())}}" class="w-100">
                                            </div>
                                            <div class="col-lg-9 col-12">
                                                <div class="fw-bold h5 text-main">
                                                    {{$news->getTitle()}}
                                                </div>
                                                <div class="fw-light">
                                                    {{$news->getDescription()}}
                                                </div>
                                                <div class="mt-1 fw-lighter">Nguồn
                                                    : {{\Illuminate\Support\Str::limit($news->getSlug(),20)}}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#business" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#business" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <a href="{{route("news",3)}}" class="text-reset px-lg-2">Xem tất cả <i class="fas fa-chevron-circle-right"></i></a>
    </div>
</div>
