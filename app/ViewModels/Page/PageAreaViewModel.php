<?php

namespace App\ViewModels\Page;

use App\Models\Area;
use App\Models\Page;
use App\ViewModels\Page\Object\AreaItemObject;
use Illuminate\Database\Eloquent\Collection;

class PageAreaViewModel
{
    public function __construct(
        private readonly Collection $pages,
        private readonly Collection $about_me,
        private readonly Collection $rules,
    )
    {
    }

    /**
     * @return AreaItemObject[]
     */
    public function getRules(): array
    {
        return $this->rules->map(fn(Area $area) => new AreaItemObject(id: $area["id"], title: $area["title"], slug: $area['url']))->toArray();
    }

    /**
     * @return AreaItemObject[]
     */
    public function getAboutMe(): array
    {
        return $this->about_me->map(fn(Area $area) => new AreaItemObject(id: $area["id"], title: $area["title"], slug: $area['url']))->toArray();
    }

    /**
     * @return PageOptionObject[]
     */
    public
    function getPages(): array
    {
        return $this->pages->map(fn(Page $page) => new PageOptionObject(title: $page["title"], slug: $page["slug"]))->toArray();
    }
}
