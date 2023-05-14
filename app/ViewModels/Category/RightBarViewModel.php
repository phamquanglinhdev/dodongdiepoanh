<?php

namespace App\ViewModels\Category;

use App\ViewModels\Category\Object\CategoryObject;

class RightBarViewModel
{
    public function __construct(
        readonly private CategoryObject $categoryObject,
    )
    {
    }

    /**
     * @return CategoryObject
     */
    public function getCategoryObject(): CategoryObject
    {
        return $this->categoryObject;
    }
}
