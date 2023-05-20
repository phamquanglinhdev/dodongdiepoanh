@php
    use App\ViewModels\Banner\BannerHomeViewModel;
    /**
    * @var BannerHomeViewModel $bannerHomeViewModel
    */
@endphp
<div id="banner" class="carousel slide  carousel-fade" data-mdb-ride="carousel">
    <div class="carousel-inner">
        @foreach($bannerHomeViewModel->getBanners() as $banner)
            <div class="carousel-item @if($loop->first) active @endif">
                <img src="{{url($banner->getImage()??"/")}}" class="d-block w-100" alt="{{$banner->getName()}}"/>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-mdb-target="#banner"
            data-mdb-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#banner"
            data-mdb-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
