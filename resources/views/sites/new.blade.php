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

            .content span, .content figure img,.content figure {
                width: 100% !important;
                height: auto !important;
            }

        }
        figure{
            text-align: center;
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
            <div class="col-lg-3 d-none d-lg-block border">
                @include("components.top-news-2")
            </div>
            <div class="col-lg-9 col-12">
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
                <hr>
                <div>
                    <a href="#" class="text-reset">
                        <span>Đọc thêm: Bài viết mẫu nữa nè</span>
                        <i class="fas fa-arrow-alt-circle-right"></i>
                    </a>
                    <div class="text-main">
                        <i class="fas fa-tags"></i>
                        <span>Tags:</span>
                        <a href="#" class="text-reset">
                            Bài viết
                        </a>,
                        <a href="#" class="text-reset">
                            Khoa học
                        </a>,
                        <a href="#" class="text-reset">
                            Đúc đồng
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
