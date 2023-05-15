<?php

namespace App\ViewModels\Product;

use App\ViewModels\Product\Object\TopProductObject;
use Illuminate\Support\Collection;

class TopProductViewModel
{
    public function __construct(
        readonly private Collection $topProductsObjects
    )
    {
    }

    /**
     * @return TopProductObject[]
     */
    public function getTopProductsObjects(): array
    {
        return $this->topProductsObjects->map(
            fn(Collection $collection) => new TopProductObject(products: $collection)
        )->toArray();
    }
}
