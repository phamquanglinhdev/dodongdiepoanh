<?php

namespace App\Repositories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;


class BannerRepository extends BaseRepository
{
    public function __construct(Banner $model)
    {
        parent::__construct($model);
    }

    public function getBannerForHome(): array|Collection
    {
        return $this->getBuilder()->where("position", "index")->get();
    }
}
