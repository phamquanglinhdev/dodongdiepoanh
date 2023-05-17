<?php

namespace App\ViewModels\Page;

use App\Models\Page;
use App\ViewModels\Page\Object\PageObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class PageViewModel
{
    public function __construct(
        private readonly Model|Builder $page
    )
    {
    }

    /**
     * @return PageObject
     */
    public function getPage(): PageObject
    {
        /**
         * @var Page $pageModel
         */
        $pageModel = $this->page;
        return new PageObject(title: $pageModel["title"], body: $pageModel["body"]);
    }
}
