<?php

namespace App\Repositories;

use App\Models\Category;
use App\ViewModels\Category\Object\CategoryObject;
use App\ViewModels\Menu\Object\MenuObject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getCategoryById($categoryId): Model|Builder
    {
        return $this->getBuilder()->where("id", $categoryId)->firstOrFail();
    }

    public function getCategoriesByParent($parentId): array|Collection
    {
        return $this->getBuilder()->where("parent_id", $parentId)->orderBy("lft")->get();
    }

    public function getCategoryForRecursive($categoryId = 1): MenuObject
    {
        $category = $this->getCategoryById($categoryId);
        $children = $this->getCategoriesByParent($categoryId);
        return new MenuObject(
            title: $category["parent_id"] ? $category["name"] : "Sản phẩm",
            url: route("products", $category["id"]), children: $children->map(function (Category $category) {
            return $this->getCategoryForRecursive($category["id"]);
        })->toArray());
    }

    public function getCategoryForRecursiveSideBar($categoryId = 1): CategoryObject
    {
        $category = $this->getCategoryById($categoryId);
        $children = $this->getCategoriesByParent($categoryId);
        return new CategoryObject(
            id: $category["id"],
            title: $category["name"],
            url: route("products", $category["id"]),
            children: $children->map(function (Category $category) {
                return $this->getCategoryForRecursiveSideBar($category["id"]);
            })->toArray());
    }
}
