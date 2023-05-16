<?php

namespace App\Composers;

use App\Repositories\NewsRepository;
use App\ViewModels\News\TopNewsViewModel;
use Illuminate\View\View;

class TopNewComposer
{
    public function __construct(
        private readonly NewsRepository $newsRepository
    )
    {
    }

    public function compose(View $view): void
    {
        $trendingNews = $this->newsRepository->getMostNewsByView();
        $recentlyNews = $this->newsRepository->getMostNewByCreatedAt();
        $view->with("topNewsViewModel", new TopNewsViewModel($trendingNews, $recentlyNews));
    }
}
