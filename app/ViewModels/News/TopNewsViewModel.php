<?php

namespace App\ViewModels\News;

use App\Models\News;
use App\ViewModels\News\Object\TopNewsObject;
use Illuminate\Database\Eloquent\Collection;

class TopNewsViewModel
{
    public function __construct(
        private readonly Collection $trendingNews,
        private readonly Collection $recentlyNews,
    )
    {
    }

    /**
     * @return TopNewsObject[]
     */
    public function getTrendingNews(): array
    {
        return $this->trendingNews->map(fn(News $news) => new TopNewsObject(
            title: $news["title"],
            slug: $news["slug"],
            type: $news["type_id"] == 0 ? "Tin tức thường" : "Tin tức doanh nghiệp",
            updated_at: $news['updated_at']
        ))->toArray();
    }

    /**
     * @return TopNewsObject[]
     */
    public function getRecentlyNews(): array
    {
        return $this->recentlyNews->map(fn(News $news) => new TopNewsObject(
            title: $news["title"],
            slug: $news["slug"],
            type: $news["type_id"] == 0 ? "Tin tức thường" : "Tin tức doanh nghiệp", updated_at: $news["updated_at"]
        ))->toArray();
    }
}
