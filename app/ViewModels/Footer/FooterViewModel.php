<?php

namespace App\ViewModels\Footer;

use App\Models\Area;
use App\ViewModels\Footer\Object\AreaObject;
use Illuminate\Database\Eloquent\Collection;

class FooterViewModel
{
    public function __construct(
        private readonly Collection $about_me,
        private readonly Collection $rules,
    )
    {
    }

    /**
     * @return AreaObject[]
     */
    public function getAboutMe(): array
    {
        return $this->about_me->map(fn(Area $area) => new AreaObject(title: $area["title"], url: $area["url"]))->toArray();
    }

    /**
     * @return AreaObject[]
     */
    public function getRules(): array
    {
        return $this->rules->map(fn(Area $area) => new AreaObject(title: $area["title"], url: $area["url"]))->toArray();
    }
}
