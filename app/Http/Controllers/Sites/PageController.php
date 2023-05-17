<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use App\ViewModels\Page\PageViewModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(
        private readonly PageRepository $pageRepository
    )
    {
    }

    public
    function index($slug = ""): View
    {
        $pageCollection = $this->pageRepository->getPageBySlug($slug);
        return \view("sites.page", [
            'pageViewModel' => new PageViewModel(page: $pageCollection)
        ]);
    }
}
