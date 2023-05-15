<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\ViewModels\Product\ProductListViewModel;
use App\ViewModels\Product\ProductShowViewModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductRepository  $productRepository,
        private readonly CategoryRepository $categoryRepository,
    )
    {
    }

    public function showProductAction($id): View
    {
        $productShowViewModel = new ProductShowViewModel(product: $this->productRepository->getProductById($id));
        return view("sites.product", [
            'productShowViewModel' => $productShowViewModel
        ]);
    }

    public function listProductAction(int $category_id = 1): View
    {
        $category = $this->categoryRepository->getCategoryById($category_id);
        $productCollection = $this->productRepository->getProductPagination($category_id);
        $productListViewModel = new ProductListViewModel(productsPaginate: $productCollection, categoryId: $category["id"], categoryName: $category['name']);
        return \view("sites.products", [
            'productListViewModel' => $productListViewModel
        ]);
    }

}
