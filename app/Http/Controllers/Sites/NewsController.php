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
        $typeName = "";
        switch ($type) {
            case 0:
                $typeName = "Tin tức doanh nghiệp";
                break;
            case 1:
                $typeName = "Kiến thức đồ đồng";
                break;
            case 3:
                $typeName = "Báo chí nói gì về Đồ đồng Điệp Oanh";
                break;
        }
        return \view("sites.news", [
            'newsListViewModel' => new NewListViewModel(
                news: $this->newsRepository->getNewsByType($type, 8),
                new_type_name: $typeName
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
