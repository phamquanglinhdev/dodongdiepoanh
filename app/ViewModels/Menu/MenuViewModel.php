<?php

namespace App\ViewModels\Menu;

use App\ViewModels\Menu\Object\MenuObject;

class MenuViewModel
{
    public function __construct(
        private readonly MenuObject $menuObject
    )
    {
    }

    /**
     * @return MenuObject
     */
    public function getMenuObject(): MenuObject
    {
        return $this->menuObject;
    }
}
