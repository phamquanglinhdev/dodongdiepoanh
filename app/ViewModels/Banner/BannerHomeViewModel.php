<?php

namespace App\ViewModels\Banner;

use App\Models\Banner;
use App\ViewModels\Banner\Object\BannerObject;
use Illuminate\Database\Eloquent\Collection;

class BannerHomeViewModel
{
    public function __construct(
        readonly private Collection $banners
    )
    {
    }

    /**
     * @return BannerObject[]
     */
    public function getBanners(): array
    {
        return $this->banners->map(fn(Banner $banner) => new BannerObject(
            id: $banner["id"], name: $banner["name"], image: $banner["image"], url: $banner["url"]
        ))->toArray();
    }
}
