@php
    use App\ViewModels\Footer\FooterViewModel;
    /**
    * @var FooterViewModel $footerViewModel
    */
@endphp
    <!-- Footer -->
<footer class="text-center text-lg-start bg-main text-white">
    <section class="px-5 pt-5">
        <div class="container-fluid text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <img alt="logo-white" src="{{asset("img/logo-white.png")}}" style="width: 2em">
                        <span>CÔNG TY TNHH MỘT THÀNH VIÊN ĐÚC ĐIỆP OANH</span>
                    </h6>
                    {!! setting("footer_description") !!}
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 d-lg-block d-none">
                        Về chúng tôi
                    </h6>
                    @foreach($footerViewModel->getAboutMe() as $about_me)
                        <p>
                            <a href="{{url("trang/".$about_me->getUrl())}}"
                               class="text-reset">{{$about_me->getTitle()}}</a>
                        </p>
                    @endforeach
                </div>
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Điều khoản
                    </h6>
                    @foreach($footerViewModel->getRules() as $rules)
                        <p>
                            <a href="{{url("trang/".$rules->getUrl())}}" class="text-reset">{{$rules->getTitle()}}</a>
                        </p>
                    @endforeach
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Bản đồ Google Map
                    </h6>
                    <div class="ratio-16x9 ratio">
                        <iframe
                            class="rounded"
                            src="{{setting("map_code")}}"
                            style="border:0;" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © {{\Illuminate\Support\Carbon::now()->year}} Copyright:
        <a class="text-reset fw-bold" href="{{route("index")}}">Dodongdiepoanh.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
