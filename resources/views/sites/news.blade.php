@php
    use Illuminate\Support\Str;
    use App\ViewModels\News\NewListViewModel;
    /**
    * @var NewListViewModel $newsListViewModel
    */
@endphp
@extends("layouts.app")
@section("title")
    {{$newsListViewModel->getNewTypeName()}}
@endsection
@section("content")
    <div class="container-fluid pt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Trang chủ</a></li>
                {{--                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Tin tức</a></li>--}}
                <li class="breadcrumb-item active" aria-current="page">{{$newsListViewModel->getNewTypeName()}}</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="row">
                    <div class=" col-lg-3 col-6 col-12 mb-3">
                        <div class="text-white bg-main p-3">{{$newsListViewModel->getNewTypeName()}}</div>
                    </div>
                </div>
                <div class="row">
                    @foreach($newsListViewModel->getNews() as $news)
                        <div class="col-lg-4  col-sm-6 col-12 mb-4">
                            <a href="{{$news->getSlug()}}" class="text-reset">
                                <div class="card border h-100">
                                    <div class="ratio ratio-16x9">
                                        <img src="{{url($news->getThumbnail())}}"
                                             class="card-img-top"
                                             alt="thumbnail"/>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title fw-bold text-main">{{Str::limit($news->getTitle(),60)}}</div>
                                        <p class="card-text">
                                            {{Str::limit($news->getDescription(),100)}}
                                        </p>
                                        <div class="text-center">
                                            <a href="{{$news->getSlug()}}" class="text-main w-100">Xem chi
                                                tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="my-lg-3 my-2"></div>
                    @include("sites.inc.pagination",
                        ["currentPage"=>$newsListViewModel->getPagination()->currentPage(),"totalPage"=>$newsListViewModel->getPagination()->lastPage()])
                </div>
            </div>
            <div class="col-lg-3 d-lg-block d-none">
                @include("components.top-news-2")
                <div class="d-none">
                    @include("sites.inc.right-bar")
                </div>
            </div>
        </div>
    </div>
@endsection
