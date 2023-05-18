@php
    use App\ViewModels\Product\ProductListViewModel;
    /**
    * @var ProductListViewModel $productListViewModel
    */
@endphp
@extends("layouts.app")
@section("title")
    {{$productListViewModel->getCategoryName()}}
@endsection
@section("content")
    <div class="container-fluid pt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$productListViewModel->getCategoryName()}}</li>
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
                    <div class=" col-lg-3 col-6 col-12 p-0 px-lg-3">
                        <div class="text-white bg-main p-3 text-uppercase">{{$productListViewModel->getCategoryName()}}</div>
                    </div>
                </div>
                <div class="row mt-2">
                    @foreach($productListViewModel->getProduct() as $product)
                        <div class="col-lg-3 mb-3 col-6 p-lg-3 p-1">
                            <a href="{{route("product",$product->getId())}}">
                                <div class="card rounded-0 p-lg-0 border h-100">
                                    <img src="{{url($product->getThumbnail())}}" class="card-img-top rounded-0"
                                         alt="Fissure in Sandstone"/>
                                    <div class="card-body">
                                        <div class="card-title text-main fw-bold text-uppercase ">{{$product->getName()}}</div>
                                        <div class="card-text">Loại : <a href="#">{{$product->getCategoryName()}}</a>
                                        </div>
                                        <div class="card-text">Kích thước : {{$product->getSize()}}</div>
                                        <div class="card-text">Mã sản phẩm : {{$product->getCode()}}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mb-3">
                    @include("sites.inc.pagination",[
                        'currentPage'=>$productListViewModel->getProductsPaginate()->currentPage(),
                        'totalPage'=>$productListViewModel->getProductsPaginate()->lastPage()

                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

