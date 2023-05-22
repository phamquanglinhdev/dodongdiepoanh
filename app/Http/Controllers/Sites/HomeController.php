<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use App\ViewModels\Project\ProjectViewModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        readonly private ProjectRepository $projectRepository
    )
    {
    }

    public function indexPageAction(): View
    {
        return view("sites.index");
    }

    public function projectPageAction(): View
    {
        return \view("sites.project", [
            'projectViewModel' => new ProjectViewModel($this->projectRepository->listAll())
        ]);
    }
}
