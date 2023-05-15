<?php

namespace App\ViewModels\Product;

use App\Models\Product;
use App\ViewModels\Product\Object\ProductListObject;
use App\ViewModels\Product\Object\ProductShowObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class ProductShowViewModel
{
    public function __construct(
        private readonly Product|Model|Builder $product,
    )
    {
    }

    /**
     * @return ProductShowObject
     */
    public function getProduct(): ProductShowObject
    {
        $product = $this->product;
        return new ProductShowObject(
            name: $product["name"],
            category_id: $product->category->id,
            category_name: $product->category->name,
            thumbnail_1: $product["thumbnail_1"],
            thumbnail_2: $product["thumbnail_2"] ?? $product["thumbnail_1"],
            thumbnail_3: $product["thumbnail_3"] ?? $product["thumbnail_1"],
            thumbnail_4: $product["thumbnail_4"] ?? $product["thumbnail_1"],
            thumbnail_5: $product["thumbnail_5"] ?? $product["thumbnail_1"],
            description: $product["description"] ?? "-",
            code: $product["code"], size: $product["size"],
            material: $product["material"], status: $product["status"] == 0 ? "Còn hàng" : "Hết hàng"
        );
    }
}
