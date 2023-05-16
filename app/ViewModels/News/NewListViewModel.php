<?php

namespace App\ViewModels\News;

use App\Models\News;
use App\ViewModels\News\Object\NewListObject;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class NewListViewModel
{
    public function __construct(
        private readonly LengthAwarePaginator $news,
        private readonly string               $new_type_name,
    )
    {
    }

    /**
     * @return string
     */
    public function getNewTypeName(): string
    {
        return $this->new_type_name;
    }

    /**
     * @return NewListObject[]
     */
    public function getNews(): array
    {
        return $this->news->map(
            fn(News $news) => new NewListObject(
                id: $news['id'],
                title: $news["title"],
                thumbnail: $news["thumbnail"],
                description: $news['description'],
                slug: $news["slug"]
            ))->toArray();
    }

    public function getPagination(): LengthAwarePaginator
    {
        return $this->news;
    }

}
