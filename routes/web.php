<?php

use App\Http\Controllers\Sites\HomeController;
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
});

