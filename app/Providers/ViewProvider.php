<?php
namespace App\Providers;
use App\Models\Category;
use App\Models\Menu;
use App\Repositories\CategoryRepository;
use App\Repositories\MenuRepository;
use App\ViewModels\Category\RightBarViewModel;
use App\ViewModels\Menu\MenuViewModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewProvider extends ServiceProvider
{
    private MenuRepository $menuRepository;
    private CategoryRepository $categoryRepository;

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
        View::composer("sites.inc.right-bar", function ($view) {
            $this->categoryRepository = new CategoryRepository(model: new Category());
            return $view->with("rightBarViewModel", new RightBarViewModel(categoryObject: $this->categoryRepository->getCategoryForRecursiveSideBar()));
        });
    }
}
