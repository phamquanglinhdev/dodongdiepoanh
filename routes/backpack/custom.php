<?php

use App\Http\Controllers\Admin\PageCrudController;
use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array)config('backpack.base.web_middleware', 'web'),
        (array)config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('menu', 'MenuCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('news', 'NewsCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('page', 'PageCrudController');
    Route::get("/page/area", [PageCrudController::class, "area"])->name("page.area");
    Route::post("/page/area", [PageCrudController::class, "pushArea"])->name("page.area.push");
    Route::post("/page/area/order", [PageCrudController::class, "orderArea"])->name("page.area.order");
    Route::post("/page/area/remove", [PageCrudController::class, "removeArea"])->name("page.area.remove");
}); // this should be the absolute last line of this file
