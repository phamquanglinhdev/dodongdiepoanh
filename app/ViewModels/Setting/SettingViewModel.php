<?php

namespace App\ViewModels\Setting;

use App\Repositories\CategoryRepository;
use App\ViewModels\Category\Object\CategoryObject;
use App\ViewModels\Setting\Object\SettingObject;
use Illuminate\Database\Eloquent\Collection;

/**
 *
 */
class SettingViewModel
{
    /**
     * @param Collection|array $settings
     */
    public function __construct(
        private readonly Collection|array   $settings,
        private readonly CategoryRepository $categoryRepository,
    )
    {
    }

    /**
     * @return CategoryObject
     */
    public function getCategoryRepository(): CategoryObject
    {
        return $this->categoryRepository->getCategoryForRecursiveSideBar();
    }

    /**
     * @param $name
     * @return SettingObject
     */
    public function getProperty($name): SettingObject
    {
        $settingModel = $this->settings->where("name", $name)->first();
        if (!$settingModel->id) {
            return new SettingObject(id: null, name: null, value: null);
        }
        return new SettingObject(id: $settingModel['id'], name: $settingModel["name"], value: $settingModel["value"]);
    }
}
