<?php

namespace App\Composers;

use App\Repositories\NewsRepository;
use App\ViewModels\News\TopNewHomeViewModel;
use App\ViewModels\News\TopNewsViewModel;
use Illuminate\View\View;

class TopViewHomeComposer
{
    public function __construct(
        private readonly NewsRepository $newsRepository
    )
    {
    }

    public function compose(View $view): void
    {
        $normal = $this->newsRepository->getTopNormalNew();
        $business = $this->newsRepository->getTopBusinessNew();
        $view->with("topNewHomeViewModel", new TopNewHomeViewModel($normal, $business));
    }
}
