<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\ViewModels\News\NewListViewModel;
use App\ViewModels\News\NewShowViewModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function __construct(
        readonly private NewsRepository $newsRepository
    )
    {
    }

    public function listNewsControllers($type = 0): View
    {
        return \view("sites.news", [
            'newsListViewModel' => new NewListViewModel(
                news: $this->newsRepository->getNewsByType($type, 8),
                new_type_name: $type == 0 ? "Tin tức thường" : "Tin tức doanh nghiệp"
            )
        ]);
    }

    public function showNewsControllers($slug): View
    {
        $news = $this->newsRepository->getNewBySlug($slug);
        $news->view += 1;
        $news->save();
        $newsShowViewModel = new NewShowViewModel(news: $news);
        return \view("sites.new", [
            'newShowViewModel' => $newsShowViewModel
        ]);
    }
}
