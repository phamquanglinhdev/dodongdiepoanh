@php
    @endphp
@extends("layouts.app")
@section("title")
    Đồ đồng Điệp Oanh
@endsection
@section("content")
    @include("components.carousel")
    <div class="container-fluid">
        <div class="px-lg-5 mt-lg-5">
            <div class="row">
                <div class="col-lg-3 p-3 d-lg-block d-none">
                    @include("sites.inc.right-bar")
                </div>
                <div class="col-lg-9 col-12">
                    @include("components.top-product")
                </div>
            </div>
        </div>
        <div class="container-lg-fluid px-lg-5">
            @include("components.top-news")
        </div>
        <div class="container-lg-fluid px-lg-5">
            @include("components.top-video")
        </div>
    </div>
@endsection
