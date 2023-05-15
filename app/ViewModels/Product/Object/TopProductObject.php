<?php

namespace App\ViewModels\Product\Object;

use App\Models\Product;
use Illuminate\Support\Collection;

class TopProductObject
{
    public function __construct(
        readonly private Collection $products
    )
    {
    }

    /**
     * @return ProductListObject[]
     */
    public function getProducts(): array
    {
        return $this->products->map(
            fn(Product $product) => new ProductListObject(
                id: $product["id"],
                name: $product["name"],
                category_name: $product->category->name,
                category_id: $product->category->id,
                size: $product["size"],
                code: $product["code"],
                thumbnail: $product["thumbnail_1"]
            )
        )->toArray();
    }
}
