<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Menu;
use App\ViewModels\Menu\Object\MenuObject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class MenuRepository extends BaseRepository
{
    public function __construct(Menu $model)
    {
        parent::__construct($model);
    }

    public function getMenuById($id): Model|Builder
    {
        return $this->getBuilder()->where("id", $id)->firstOrFail();
    }

    public function getMenusByParentId($parentId): Collection|array
    {
        return $this->getBuilder()->where("parent_id", $parentId)->orderBy("lft")->get();
    }

    public function getRecursiveMenuForSite($menuId = 1): MenuObject
    {

        $menu = $this->getMenuById($menuId);
        $children = $this->getMenusByParentId($menuId);
        return new MenuObject(
            title: $menu["title"], url: $menu["url"], children: $children->map(function (Menu $menu) {
            if ($menu["mgroup"] == 7) {
                $categoryRepository = new CategoryRepository(new Category());
                return $categoryRepository->getCategoryForRecursive();
            }
            if ($menu["mgroup"] == 1) {
                return new MenuObject(
                    title: $menu["title"],
                    url: route("index"),
                    children: [],
                );
            }
            return $this->getRecursiveMenuForSite($menu["id"]);
        })->toArray(),
        );
    }
}
