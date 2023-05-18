<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\SettingRepository;
use App\ViewModels\Setting\SettingViewModel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class SettingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SettingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Setting::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/setting');
        CRUD::setEntityNameStrings('setting', 'settings');
        $this->crud->denyAccess(["create", "edit", "delete"]);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('active');
        CRUD::column('created_at');
        CRUD::column('name');
        CRUD::column('setting_type');
        CRUD::column('updated_at');
        CRUD::column('value');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    public function index(SettingRepository $settingRepository, CategoryRepository $categoryRepository): View
    {
        return view("vendor.backpack.setting", [
            'settingViewModel' => new SettingViewModel($settingRepository->listAll(), $categoryRepository)
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SettingRequest::class);

        CRUD::field('active');
        CRUD::field('name');
        CRUD::field('setting_type');
        CRUD::field('value');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    public function update(Request $request, SettingRepository $settingRepository)
    {
        $settingCollection = $request->except("_token", "_method");
        $settingRepository->getBuilder()->where("name","pin_category_ids")->update(["value" => "[]"]);
        foreach ($settingCollection as $name => $value) {
            $settingRepository->getBuilder()->where("name", $name)->update(['value' => $value]);
        }
        return redirect("admin/setting");
    }
}
