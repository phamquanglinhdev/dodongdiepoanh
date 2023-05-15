@php

    @endphp
@extends("layouts.app")
@section("title")
Đồ đồng Điệp Oanh
@endsection
@section("content")
    <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset("img/banner.jpg")}}" class="d-block w-100" alt="Wild Landscape"/>
            </div>
            <div class="carousel-item">
                <img src="{{asset("img/banner.jpg")}}" class="d-block w-100" alt="Camera"/>
            </div>
            <div class="carousel-item">
                <img src="{{asset("img/banner.jpg")}}" class="d-block w-100" alt="Exotic Fruits"/>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls"
                data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls"
                data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container-lg-fluid px-lg-5 mt-lg-5">
        <div class="row">
            <div class="col-lg-3 d-lg-block d-none">
                @include("sites.inc.right-bar")
            </div>
            <div class="col-md-9 col-12">
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
@endsection
