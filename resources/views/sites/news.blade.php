@php
    use Illuminate\Support\Str;
@endphp
@extends("layouts.app")
@section("title")

@endsection
@section("content")
    <div class="container-fluid pt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Tin tức</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tin tức thường</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 d-lg-block d-none">
                @include("components.top-news-2")
            </div>
            <div class="col-lg-9 col-12">
                <div class="row">
                    <div class=" col-lg-3 col-6 col-12 mb-3">
                        <div class="text-white bg-main p-3">TIN TỨC BÌNH THƯỜNG</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
                                 alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h5 class="card-title">{{Str::limit("Bài viết mẫu với tiêu đề này không dài lắm nhưng nếu dài có thể cắt bớt đi",50)}}</h5>
                                <p class="card-text">
                                    {{Str::limit("Some quick example text to build on the card title and make up the bulk of
                                    the card's content.
                                    Some quick example text to build on the card title and make up the bulk of
                                    the card's content.",150)}}
                                </p>
                                <a href="#!" class="btn btn-secondary w-100">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
                                 alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h5 class="card-title">{{Str::limit("Bài viết mẫu với tiêu đề này không dài lắm nhưng nếu dài có thể cắt bớt đi",50)}}</h5>
                                <p class="card-text">
                                    {{Str::limit("Some quick example text to build on the card title and make up the bulk of
                                    the card's content.
                                    Some quick example text to build on the card title and make up the bulk of
                                    the card's content.",150)}}
                                </p>
                                <a href="#!" class="btn btn-secondary w-100">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
                                 alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h5 class="card-title">{{Str::limit("Bài viết mẫu với tiêu đề này không dài lắm nhưng nếu dài có thể cắt bớt đi",50)}}</h5>
                                <p class="card-text">
                                    {{Str::limit("Some quick example text to build on the card title and make up the bulk of
                                    the card's content.
                                    Some quick example text to build on the card title and make up the bulk of
                                    the card's content.",150)}}
                                </p>
                                <a href="#!" class="btn btn-secondary w-100">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
                                 alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h5 class="card-title">{{Str::limit("Bài viết mẫu với tiêu đề này không dài lắm nhưng nếu dài có thể cắt bớt đi",50)}}</h5>
                                <p class="card-text">
                                    {{Str::limit("Some quick example text to build on the card title and make up the bulk of
                                    the card's content.
                                    Some quick example text to build on the card title and make up the bulk of
                                    the card's content.",150)}}
                                </p>
                                <a href="#!" class="btn btn-secondary w-100">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
                                 alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h5 class="card-title">{{Str::limit("Bài viết mẫu với tiêu đề này không dài lắm nhưng nếu dài có thể cắt bớt đi",50)}}</h5>
                                <p class="card-text">
                                    {{Str::limit("Some quick example text to build on the card title and make up the bulk of
                                    the card's content.
                                    Some quick example text to build on the card title and make up the bulk of
                                    the card's content.",150)}}
                                </p>
                                <a href="#!" class="btn btn-secondary w-100">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
                                 alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h5 class="card-title">{{Str::limit("Bài viết mẫu với tiêu đề này không dài lắm nhưng nếu dài có thể cắt bớt đi",50)}}</h5>
                                <p class="card-text">
                                    {{Str::limit("Some quick example text to build on the card title and make up the bulk of
                                    the card's content.
                                    Some quick example text to build on the card title and make up the bulk of
                                    the card's content.",150)}}
                                </p>
                                <a href="#!" class="btn btn-secondary w-100">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
                                 alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h5 class="card-title">{{Str::limit("Bài viết mẫu với tiêu đề này không dài lắm nhưng nếu dài có thể cắt bớt đi",50)}}</h5>
                                <p class="card-text">
                                    {{Str::limit("Some quick example text to build on the card title and make up the bulk of
                                    the card's content.
                                    Some quick example text to build on the card title and make up the bulk of
                                    the card's content.",150)}}
                                </p>
                                <a href="#!" class="btn btn-secondary w-100">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top"
                                 alt="Fissure in Sandstone"/>
                            <div class="card-body">
                                <h5 class="card-title">{{Str::limit("Bài viết mẫu với tiêu đề này không dài lắm nhưng nếu dài có thể cắt bớt đi",50)}}</h5>
                                <p class="card-text">
                                    {{Str::limit("Some quick example text to build on the card title and make up the bulk of
                                    the card's content.
                                    Some quick example text to build on the card title and make up the bulk of
                                    the card's content.",150)}}
                                </p>
                                <a href="#!" class="btn btn-secondary w-100">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
