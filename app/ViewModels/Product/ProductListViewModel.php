<?php

namespace App\ViewModels\Product;

use App\Models\Product;
use App\ViewModels\Product\Object\ProductListObject;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductListViewModel
{
    public function __construct(
        readonly private LengthAwarePaginator $productsPaginate,
        readonly private int                  $categoryId,
        readonly private string               $categoryName,
    )
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getProductsPaginate(): LengthAwarePaginator
    {
        return $this->productsPaginate;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    /**
     * @return ProductListObject[]
     */
    public function getProduct(): array
    {
        return $this->productsPaginate->map(
            fn(Product $product)=> new ProductListObject(
                id: $product["id"],
                name: $product["name"],
                category_name: $product->category->name,
                category_id: $product->category->id,
                size: $product["size"],
                code: $product["code"],
                thumbnail: $product['thumbnail_1']
            )
        )->toArray();
    }
}
