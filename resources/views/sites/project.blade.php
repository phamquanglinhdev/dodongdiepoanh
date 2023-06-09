@php
    use App\ViewModels\Project\ProjectViewModel;
    /**
* @var ProjectViewModel $projectViewModel
 */
@endphp
@extends("layouts.app")
@section("title")
    Công trình tiêu biểu
@endsection
@push("page_css")
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
@endpush
@section("content")
    <div class="container-fluid">
        <div class="container pt-5">
            <div class="row px-lg-5 p-0">
                <div
                    class="col-12 col-sm-12 col-md-12 col-lg-6 d-flex md-order-last justify-content-center align-items-center h-100">
                    <div>
                        <div class="pt-4 pb-1 text-main fw-bold h2">{{$projectViewModel->getHeadingTop()}}</div>
                        <h2 class="sub-title pb-4 text-main">{{$projectViewModel->getHeadingBottom()}}</h2>
                        <p class="desc pb-2 pt-4">{{$projectViewModel->getText()}}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 md-order-first px-0">
                    <div class=" rounded-circle my-3 text-center mx-auto">
                        <img src="{{url($projectViewModel->getImage())}}" class="img-fluid avatar rounded p-lg-3 p-0"
                             alt="">
                    </div>
                    <h4 class="text-center text-main font-weight-bold">{{$projectViewModel->getImageAlt()}}</h4>
                </div>
            </div>
            <div class="my-5">
                <div class="h1 fw-bold text-main text-center">DỰ ÁN TIÊU BIỂU</div>
                <div class="text-center h6 mb-5"> Với kinh nghiệp nhiều đời, Đồ đồng Điệp Oanh đã có những thành tựu
                    tiêu biểu trong đúc đồng như:
                </div>
                <div class="owl-carousel owl-theme">
                    @foreach($projectViewModel->getProjects() as $project)
                        <div class="">
                            <div class="card border">
                                <img src="{{$project->getThumbnail()}}" class="card-img-top"
                                     alt="Fissure in Sandstone"/>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{$project->getName()}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid d-none">
        @include("sites.inc.right-bar")
    </div>
@endsection
@push("page_js")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:2,
                        nav:false
                    },
                    1000:{
                        items:4,
                        nav:true,
                    }
                }
            });
        });
    </script>
@endpush
