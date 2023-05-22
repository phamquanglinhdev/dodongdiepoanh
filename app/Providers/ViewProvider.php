<?php

namespace App\Providers;

use App\Composers\BannerHomeComposer;
use App\Composers\FooterComposer;
use App\Composers\MiniMenuComposer;
use App\Composers\RightBarComposer;
use App\Composers\TopNewComposer;
use App\Composers\TopProductComposer;
use App\Composers\TopViewHomeComposer;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\MenuRepository;
use App\Repositories\ProductRepository;
use App\ViewModels\Category\RightBarViewModel;
use App\ViewModels\Menu\MenuViewModel;
use App\ViewModels\News\TopNewHomeViewModel;
use App\ViewModels\Product\TopProductViewModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewProvider extends ServiceProvider
{
    private MenuRepository $menuRepository;
    private CategoryRepository $categoryRepository;
    private ProductRepository $productRepository;

    public function __construct($app)
    {
        parent::__construct($app);
    }

    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer("sites.inc.navbar", function ($view) {
            $this->menuRepository = new MenuRepository(model: new Menu());
            return $view->with("menuViewModel", new MenuViewModel(menuObject: $this->menuRepository->getRecursiveMenuForSite()));
        });
        View::composer("sites.inc.right-bar", RightBarComposer::class);
        View::composer("components.top-product", TopProductComposer::class);
        View::composer("components.top-news-2", TopNewComposer::class);
        View::composer("components.top-news", TopViewHomeComposer::class);
        View::composer("components.top-news-box", TopViewHomeComposer::class);
        View::composer("sites.inc.footer", FooterComposer::class);
        View::composer("components.carousel", BannerHomeComposer::class);
        View::composer("components.mini_menu", MiniMenuComposer::class);
    }
}
