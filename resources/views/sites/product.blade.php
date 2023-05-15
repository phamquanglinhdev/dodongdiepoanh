@php
    use App\ViewModels\Product\ProductShowViewModel;
    /**
    * @var ProductShowViewModel $productShowViewModel
    */
    $product = $productShowViewModel->getProduct();
@endphp
@extends("layouts.app")
@section("title")
    {{$product->getName()}}
@endsection
@section("content")
    <div class="container pt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Trang chủ</a></li>
                <li class="breadcrumb-item text-main"><a class="text-main fw-bold"
                                                         href="{{route('products',$product->getCategoryId())}}">{{$product->getCategoryName()}}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->getName()}}</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="img-fluid p-3">
                    <img alt="product" class="w-100 rounded" id="big-img" src="{{url($product->getThumbnail1())}}">
                    <div class="row my-4">
                        <div class="col">
                            <div class="img-fluid">
                                <img class="w-100 small-img" src="{{url($product->getThumbnail1())}}" alt="product">
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-fluid">
                                <img class="w-100 small-img" src="{{url($product->getThumbnail2())}}" alt="product">
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-fluid">
                                <img class="w-100 small-img" src="{{url($product->getThumbnail3())}}" alt="product">
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-fluid">
                                <img class="w-100 small-img" src="{{url($product->getThumbnail4())}}" alt="product">
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-fluid">
                                <img class="w-100 small-img" src="{{url($product->getThumbnail5())}}" alt="product">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="p-3">
                    <div class="h3 text-main">{{$product->getName()}}</div>
                    <hr>
                    <div class="fst-italic">
                        Hình thức <b>Đặt Trước</b> áp dụng cho sản phẩm chờ hoàn thiện trên 7 ngày, đơn hàng sẽ không
                        được giao ngay tới khách hàng.
                    </div>
                    <hr>
                    <div class="py-2">
                        <q>{{$product->getDescription()}}</q>
                    </div>
                    <hr>
                    <div>
                        <i class="fas fa-box p-2"></i>
                        <span><b>Mã sản phẩm </b>: {{$product->getCode()}}</span>
                    </div>
                    <div>
                        <i class="fas fa-crop-alt p-2"></i>
                        <span><b>Kích thước </b>: {{$product->getSize()}}</span>
                    </div>
                    <div>
                        <i class="fas fa-cogs p-2"></i>
                        <span><b>Chất liệu </b>: {{$product->getMaterial()}}</span>
                    </div>
                    <div>
                        <i class="fas fa-store p-2"></i>
                        <span><b>Tình trạng </b>: {{$product->getStatus()}}</span>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6 col-12">
                            <button class="w-100 btn bg-main text-white my-1 d-flex align-items-center justify-content-center">
                                <i class="fas fa-phone-volume fa-2x p-1"></i>
                                <div>
                                    <a class="text-center text-uppercase h5 text-white" href="tel:84949806083">0949 806 083</a>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-6 col-12">
                            <button class="w-100 btn bg-primary text-white my-1 d-flex align-items-center justify-content-center">
                                <img alt="zalo-white" src="{{asset("img/zalo-white.png")}}" style="width: 2.5em"
                                     class="p-1">
                                <div>
                                    <a class="text-center text-uppercase h5 text-white" href="#">Đồ đồng Điệp Oanh</a>
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
