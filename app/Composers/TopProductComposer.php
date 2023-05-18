<?php

namespace App\Composers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SettingRepository;
use App\ViewModels\Product\TopProductViewModel;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class TopProductComposer
{
    public function __construct(
        private readonly ProductRepository  $productRepository,
        private readonly SettingRepository  $settingRepository,
        private readonly CategoryRepository $categoryRepository
    )
    {
    }

    public
    function compose(View $view): View
    {
        /**
         * @var Category $category
         */
        $topProduct["sản phẩm nổi bật"] = $this->productRepository->getListProductsOrderByView();
        $pins = $this->settingRepository->getByName("pin_category_ids");
        if ($pins['value']) {
            $pins = json_decode($pins["value"]);
            foreach ($pins as $category_id) {
                $category = $this->categoryRepository->getCategoryById($category_id);
                $products = $category->Products()->orderBy("view", "DESC")->limit(8)->get();
                $name = $category["name"];
                $topProduct[$name] = $products;
            }
        }

        return $view->with("topProductViewModel", new TopProductViewModel(topProductsObjects: Collection::make($topProduct)));
    }
}
