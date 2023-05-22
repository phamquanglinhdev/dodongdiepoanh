@php
    use App\ViewModels\Page\PageViewModel;
    /**
    * @var PageViewModel $pageViewModel
    */
    $page = $pageViewModel->getPage()
@endphp
@extends("layouts.app")
@section("title")
    {{$page->getTitle()}}
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
    </style>
@endpush
@section("content")
    <div class="container-fluid pt-lg-5 pt-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-main fw-bold"
                                               href="#">{{$page->getTitle()}}</a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            {{--            <div class="col-lg-3 d-none d-lg-block border">--}}
            {{--                @include("components.top-news-2")--}}
            {{--            </div>--}}
            <div class="col-12">
                <div class="h2 text-main text-uppercase fw-bold">
                    {{$page->getTitle()}}
                </div>
                <hr>
                <div class="content col-12">
                    {!! $page->getBody() !!}
                </div>
                <hr>
                @include("components.top-news-box")
            </div>
        </div>
    </div>
    <div class="container-fluid d-none">
        @include("components.top-news-2")
    </div>
@endsection

