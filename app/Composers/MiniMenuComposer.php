<?php

namespace App\Composers;

use App\Repositories\MenuRepository;
use App\ViewModels\Menu\MenuViewModel;
use Illuminate\View\View;

class MiniMenuComposer
{
    public function __construct(
        private readonly MenuRepository $menuRepository
    )
    {
    }

    public function compose(View $view): View
    {
        $menuViewModel = new MenuViewModel(menuObject: $this->menuRepository->getRecursiveMenuForSite());
        return $view->with("menuViewModel", $menuViewModel);
    }
}
