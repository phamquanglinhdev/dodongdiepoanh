<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BannerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BannerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BannerCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Banner::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/banner');
        CRUD::setEntityNameStrings('banner', 'Danh sách banner');
    }

    public function position(): array
    {
        return [
            'index' => 'Banner trang chủ,slider',
            'left_bar' => 'Banner bên trái',
            'bottom' => 'Banner dưới'
        ];
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::column('name')->label("Tên banner");
        CRUD::column('image')->label("Ảnh banner")->type("image");
        CRUD::column('url')->label("Click Url");

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(BannerRequest::class);

        CRUD::field('image')->type("browse")->label("Ảnh banner");
        CRUD::field('name')->label("Tên banner");
        CRUD::field('position')->type("select_from_array")->options($this->position());
        CRUD::field('url')->label("Click URL");
        if (!permission("manager")) {
            $this->crud->denyAccess(["list", "create", "update", "delete"]);
        }

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
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
