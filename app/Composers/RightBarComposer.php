<?php

namespace App\Composers;

use App\Repositories\CategoryRepository;
use App\ViewModels\Category\RightBarViewModel;
use Illuminate\View\View;

class RightBarComposer
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository
    )
    {
    }

    public function compose(View $view): View
    {
        return $view->with("rightBarViewModel", new RightBarViewModel(categoryObject: $this->categoryRepository->getCategoryForRecursiveSideBar()));
    }
}
