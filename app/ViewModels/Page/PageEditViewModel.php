<?php

namespace App\ViewModels\Page;

use App\Models\Page;
use App\ViewModels\Page\Object\PageEditObject;
use App\ViewModels\Page\Object\PageObject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class PageEditViewModel
{
    /**
     * @param Model|Builder $page
     */
    public function __construct(
        private readonly Model|Builder $page
    )
    {
    }

    public function getPage(): PageEditObject
    {
        return new PageEditObject(
            id: $this->page["id"],
            title: $this->page['title'],
            body: $this->page["body"]
        );
    }
}
