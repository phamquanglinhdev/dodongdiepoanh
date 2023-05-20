@php
    use App\ViewModels\Product\TopProductViewModel;
    /**
    * @var TopProductViewModel $topProductViewModel
    */
@endphp
@foreach($topProductViewModel->getTopProductsObjects() as $key => $topProductObject)
    <div class="">
        <div class="row">
            <div class="col-lg-3 col-6 col-12 mt-lg-0 mt-lg-3 px-lg-3 p-0">
                <div class="text-white bg-main p-3 text-uppercase">{{$key}}</div>
            </div>
        </div>
        <div class="row mt-2">
            @foreach($topProductObject->getProducts() as $product)
                <div class="col-lg-3 mb-3 col-6 p-lg-3 p-1 ">
                    <a href="{{route("product",$product->getId())}}">
                        <div class="card rounded-0 p-lg-0 border h-100">
                            <img src="{{asset($product->getThumbnail())}}" class="card-img-top rounded-0"
                                 alt="Fissure in Sandstone" loading="lazy"/>
                            <div class="card-body">
                                <div class="card-title text-main fw-bold ">{{$product->getName()}}</div>
                                <div class="card-text">Loại : <a
                                        href="{{route('products',$product->getCategoryId())}}">{{$product->getCategoryName()}}</a>
                                </div>
                                <div class="card-text">Kích thước : {{$product->getSize()}}</div>
                                <div class="card-text">Mã sản phẩm : {{$product->getCode()}}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{route("products",$loop->first?2:$product->getCategoryId())}}" class="text-reset px-2">Xem tất cả
                <i class="fas fa-chevron-circle-right"></i></a>
        </div>
    </div>
@endforeach
