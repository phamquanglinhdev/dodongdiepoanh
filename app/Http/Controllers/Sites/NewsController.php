<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function listNewsControllers(): View
    {
        return \view("sites.news");
    }

    public function showNewsControllers($slug): View
    {
        return \view("sites.new");
    }
}
