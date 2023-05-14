<?php

use App\Http\Controllers\Sites\HomeController;
use App\Http\Controllers\Sites\NewsController;
use App\Http\Controllers\Sites\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace("sites")->group(function () {
    Route::get("/", [HomeController::class, "indexPageAction"])->name("index");
    Route::get("/san-pham/{slug?}", [ProductController::class, "showProductAction", "slug"])->name("product");
    Route::get("/danh-sach-san-pham/{category_id?}", [ProductController::class, "listProductAction", "category_id"])->name("products");
    Route::get("/tin-tuc/{news_type?}", [NewsController::class, "listNewsControllers", "news_type"])->name("news");
    Route::get("/chi-tiet-tin-tuc/{new_slug?}", [NewsController::class, "showNewsControllers", "slug"])->name("news");
});

