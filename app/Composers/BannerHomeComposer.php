<?php

namespace App\Composers;

use App\Repositories\BannerRepository;
use App\ViewModels\Banner\BannerHomeViewModel;
use Illuminate\View\View;

class BannerHomeComposer
{
    public function __construct(
        readonly private BannerRepository $bannerRepository
    )
    {
    }

    public function compose(View $view): View
    {
        return $view->with("bannerHomeViewModel", new BannerHomeViewModel(banners: $this->bannerRepository->getBannerForHome()));
    }
}
