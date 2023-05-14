<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function showProductAction($slug): View
    {
        return view("sites.product");
    }
}
