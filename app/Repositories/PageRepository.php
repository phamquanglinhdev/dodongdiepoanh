<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PageRepository extends BaseRepository
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function createPage(array $attribute): Model|Builder
    {
        return $this->getBuilder()->create($attribute);
    }

    public function getAllPages(): Collection|array
    {
        return $this->getBuilder()->query()->get();
    }

    public function getPageBySlug($slug): Model|Builder
    {
        return $this->getBuilder()->where("slug", $slug)->firstOrFail();
    }
}
