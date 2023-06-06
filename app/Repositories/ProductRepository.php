<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function getListProductsOrderByView(int $limit = 8): Collection|array
    {
        return $this->getBuilder()->orderBy("view", "DESC")->limit($limit)->get();
    }

    public function getListProductsOrderByPromote(int $limit = 8): Collection|array
    {
        return $this->getBuilder()->where("promote", 1)->orderBy("view", "DESC")->limit($limit)->get();
    }

    public function getProductPagination($categoryId, int $page = 12): LengthAwarePaginator
    {
        return $this->getBuilder()->where("category_id", $categoryId)->orderBy("created_at", "DESC")->paginate($page);
    }

    public function getProductSearchPagination($params, int $page = 12): LengthAwarePaginator
    {
        return $this->getBuilder()->where(function (Builder $builder) use ($params) {
            $builder
                ->where("name", "like", "%$params%")
                ->orWhereHas("category", function (Builder $builder) use ($params) {
                    $builder->where("name", "like", "%$params%");
                });
        })->orderBy("created_at", "DESC")->paginate($page);
    }

    public function getProductById($id): Builder|Model
    {
        return $this->getBuilder()->where("id", $id)->firstOrFail();
    }
}
