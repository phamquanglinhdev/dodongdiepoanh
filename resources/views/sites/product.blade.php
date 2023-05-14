@php

    @endphp
@extends("layouts.app")
@section("title")
    Sản phẩm
@endsection
@section("content")
    <div class="container pt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Trang chủ</a></li>
                <li class="breadcrumb-item text-main"><a class="text-main fw-bold" href="#">Danh mục</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="img-fluid p-3">
                    <img alt="product" class="w-100 rounded" id="big-img" src="{{asset("img/product.jpg")}}">
                    <div class="row my-4">
                        <div class="col">
                            <div class="img-fluid">
                                <img class="w-100 small-img" src="{{asset("img/product.jpg")}}" alt="product">
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-fluid">
                                <img class="w-100 small-img" src="{{asset("img/product_2.jpg")}}" alt="product">
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-fluid">
                                <img class="w-100 small-img" src="{{asset("img/product_3.webp")}}" alt="product">
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-fluid">
                                <img class="w-100 small-img" src="{{asset("img/product_2.jpg")}}" alt="product">
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-fluid">
                                <img class="w-100 small-img" src="{{asset("img/product_3.webp")}}" alt="product">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="p-3">
                    <div class="h3 text-main">Sản phẩm mẫu Đồ đồng Điệp Oanh</div>
                    <hr>
                    <div class="fst-italic">
                        Hình thức <b>Đặt Trước</b> áp dụng cho sản phẩm chờ hoàn thiện trên 7 ngày, đơn hàng sẽ không
                        được giao ngay tới khách hàng.
                    </div>
                    <hr>
                    <div class="py-2">
                        <q>Sản phẩm của Đồ đồng Điệp Oanh thể hiện chất lượng và giá trị, đảm bảo giao tói khách hàng
                            sản phẩm đáng với giá tiền</q>
                    </div>
                    <hr>
                    <div>
                        <i class="fas fa-box p-2"></i>
                        <span><b>Mã sản phẩm </b>: DVT</span>
                    </div>
                    <div>
                        <i class="fas fa-crop-alt p-2"></i>
                        <span><b>Kích thước </b>: 18 cm</span>
                    </div>
                    <div>
                        <i class="fas fa-cogs p-2"></i>
                        <span><b>Chất liệu </b>: Đồng mạ vàng</span>
                    </div>
                    <div>
                        <i class="fas fa-store p-2"></i>
                        <span><b>Tình trạng </b>: Còn hàng</span>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6 col-12">
                            <button class="w-100 btn bg-main text-white my-1 d-flex align-items-center">
                                <i class="fas fa-phone-volume fa-2x p-1"></i>
                                <div>
                                    <a class="text-uppercase h5 text-white" href="tel:84949806083">0949 806 083</a>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-6 col-12">
                            <button class="w-100 btn bg-primary text-white my-1 d-flex align-items-center">
                                <img alt="zalo-white" src="{{asset("img/zalo-white.png")}}" style="width: 2.5em" class="p-1">
                                <div>
                                    <a class="text-uppercase h5 text-white" href="#">Đồ đồng Điệp Oanh</a>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("page_css")
    <style>
        .small-img {
            cursor: pointer;
            border-radius: 1em;
        }

        .small-img:hover {
            opacity: 0.6;
            transition: 0.5s;
        }
    </style>
@endpush
@push("page_js")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".small-img").click(function (e) {
                const bigImg = $("#big-img")
                bigImg.attr("src", e.target.src)
            })
        })
    </script>
@endpush
