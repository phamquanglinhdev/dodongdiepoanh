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
    <div class="col-12 col-12 mb-3">
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
                <div class="row">
                    @foreach($topNewHomeViewModel->getNormalNews() as $news)
                        <div class="col-md-3">
                            <div class="card h-100">
                                <div class="ratio ratio-4x3">
                                    <img src="{{url($news->getThumbnail())}}" class="card-img-top" alt="Fissure in Sandstone"/>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$news->getTitle()}}</h5>
                                    <p class="card-text">{{$news->getDescription()}}</p>
                                    <a href="{{$news->getSlug()}}" class="">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-block d-lg-none">
                <div id="normal" class="carousel slide" data-mdb-ride="carousel">
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
        <a href="{{route("news",0)}}" class="text-reset px-lg-2">Xem tất cả <i class="fas fa-chevron-circle-right"></i></a>
    </div>
</div>
