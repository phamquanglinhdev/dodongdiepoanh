@php
    @endphp
@extends("layouts.app")
@section("title")
    Đồ đồng Điệp Oanh
@endsection
@section("content")
    <a href="{{backpack_url("/menu")}}" class="btn btn-primary rounded-0 text-white">Chỉnh sửa menu</a>
    <div>
        <img src="{{asset("/img/heading.jpg")}}" class="w-100">
    </div>

    <div class="border py-1">
        <a href="{{backpack_url("/banner")}}" class="btn btn-primary rounded-0 text-white">Chỉnh sửa banner</a>
        @include("components.carousel")
        <div class="container-fluid">
            <div class="px-lg-5 mt-lg-5">
                <div class="row">
                    <div class="col-lg-3 p-3 d-lg-block d-none">
                        <a href="{{backpack_url("/category")}}" class="btn btn-primary rounded-0 text-white">Chỉnh sửa cây danh mục</a>
                        @include("sites.inc.right-bar")
                    </div>
                    <div class="col-lg-9 col-12">
                        <a href="#" class="btn btn-primary rounded-0 text-white">Chỉnh sản phẩm nổi bật</a>
                        @include("components.top-product")
                    </div>
                </div>
            </div>
            <div class="container-lg-fluid px-lg-5">
                <hr class="mt-5">
                <a href="{{backpack_url("/news")}}" class="btn btn-primary rounded-0 text-white">Chỉnh sửa tin tức</a>
                <a href="{{backpack_url("/newspaper")}}" class="btn btn-primary rounded-0 text-white">Chỉnh sửa báo chí</a>
                @include("components.top-news")
            </div>
            <div class="container-lg-fluid px-lg-5">
                <a href="#" class="btn btn-primary rounded-0 text-white">Chỉnh sửa video nổi bật</a>
                @include("components.top-video")
            </div>
        </div>
    </div>
    <a href="{{backpack_url("/page/area")}}" class="btn btn-primary rounded-0 text-white">Chỉnh sửa footer</a>
    @include("sites.inc.footer")
@endsection
