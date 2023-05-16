<?php

namespace App\Repositories;

use App\Models\Area;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AreaRepository extends BaseRepository
{
    public function __construct(Area $model)
    {
        parent::__construct($model);
    }

    public function pushPage($pages): Model|Builder
    {
        return $this->getBuilder()->create($pages);
    }

    public function getAboutMeArea(): Collection|array
    {
        return $this->getBuilder()->where("locate", "about_me")->orderBy("order", "ASC")->get();
    }

    public function getRulesArea(): Collection|array
    {
        return $this->getBuilder()->where("locate", "rules")->orderBy("order", "ASC")->get();
    }
}
