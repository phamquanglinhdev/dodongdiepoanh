@php

    @endphp
@extends("layouts.app")
@section("title")
    Sản phẩm
@endsection
@section("content")
    <div class="container-fluid pt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 d-lg-block d-none">
                @include("sites.inc.right-bar")
            </div>
            <div class="col-md-9 col-12">
                <div class="row">
                    <div class=" col-lg-3 col-6 col-12 ">
                        <div class="text-white bg-main p-3">DANH MỤC SẢN PHẨM MẪU</div>
                    </div>
                </div>
                <div class="row mt-2">
                    @for($i=1;$i<=8;$i++)
                        <div class="col-lg-3 mb-3 col-6 p-lg-3 p-1">
                            <a href="#">
                                <div class="card rounded-0 p-lg-0">
                                    <img src="{{asset("img/product.jpg")}}" class="card-img-top rounded-0"
                                         alt="Fissure in Sandstone"/>
                                    <div class="card-body">
                                        <h5 class="card-title text-main ">Bộ ngũ sự, lọ hoa, đèn thờ</h5>
                                        <div class="card-text">Loại : <a href="#">Lư hương</a></div>
                                        <div class="card-text">Kích thước : 70cm</div>
                                        <div class="card-text">Mã sản phẩm : DVT</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="text-reset px-2">Xem tất cả <i class="fas fa-chevron-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
