@php
    use App\ViewModels\News\NewShowViewModel;
    /**
    * @var NewShowViewModel $newShowViewModel
    */
    $news = $newShowViewModel->getNews()
@endphp
@extends("layouts.app")
@section("title")
    {{$news->getTitle()}}
@endsection
@push("page_css")
    <style>
        @media (max-width: 768px) {
            .content span img {
                width: 100% !important;
                height: auto !important;
            }

            .content span, .content figure img, .content figure {
                width: 100% !important;
                height: auto !important;
            }

            .content div {
                width: 100% !important;
            }

        }

        figure {
            text-align: center;
        }

        .content img {
            width: 100% !important;
        }
    </style>
@endpush
@section("content")
    <div class="container-fluid pt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-main fw-bold"
                                               href="{{route("news",$news->getTypeId())}}">{{$news->getTypeName()}}</a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-12">
                <div class="h2 text-main text-uppercase fw-bold">
                    {{$news->getTitle()}}
                </div>
                <hr>
                <div>
                    <i class="fas fa-clock"></i>
                    <span class="">Cập nhật lần cuối: {{$news->getUpdatedAt()}} </span>
                </div>
                <hr>
                <div class="content col-lg-9 col-12">
                    {!! $news->getBody() !!}
                </div>
                <div class="clearfix"></div>
                <hr>
                <div>
                    {{--                    <a href="#" class="text-reset">--}}
                    {{--                        <span>Đọc thêm: Bài viết mẫu nữa nè</span>--}}
                    {{--                        <i class="fas fa-arrow-alt-circle-right"></i>--}}
                    {{--                    </a>--}}
                    <div class="text-main">
                        <i class="fas fa-tags"></i>
                        <span>Tags:</span>
                        @foreach($news->getTags() as $tag)
                            <a href="#" class="text-reset">
                                {{$tag->getName()}}
                            </a>
                            @if(!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-3 d-none d-lg-block border">
                @include("components.top-news-2")
            </div>
        </div>
    </div>
@endsection
