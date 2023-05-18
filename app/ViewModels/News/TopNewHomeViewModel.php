<?php

namespace App\ViewModels\News;

use App\Models\News;
use App\ViewModels\News\Object\TopNewsObject;
use Illuminate\Database\Eloquent\Collection;

class TopNewHomeViewModel
{
    public function __construct(
        private readonly Collection $normalNews,
        private readonly Collection $businessNews,
    )
    {
    }

    /**
     * @return TopNewsObject[]
     */
    public function getBusinessNews(): array
    {
        return $this->businessNews->map(fn(News $news) => new TopNewsObject(
            title: $news["title"], slug: $news["slug"], type: "Tin tức thường",updated_at: $news["updated_at"]
        ))->toArray();
    }

    /**
     * @return TopNewsObject[]
     */
    public function getNormalNews(): array
    {
        return $this->normalNews->map(fn(News $news) => new TopNewsObject(
            title: $news["title"], slug: $news["slug"], type: "Tin tức thường",updated_at: $news["updated_at"]
        ))->toArray();
    }
}
