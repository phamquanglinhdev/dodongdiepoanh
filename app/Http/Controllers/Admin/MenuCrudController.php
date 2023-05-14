<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MenuCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class MenuCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ReorderOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup(): void
    {
        CRUD::setModel(\App\Models\Menu::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/menu');
        CRUD::setEntityNameStrings('Menu chính', 'Menu chính');
    }

    protected function setupReorderOperation(): void
    {
        $this->crud->set('reorder.label', 'title');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::column('title')->label("Tiêu đề");
        CRUD::column('mgroup')->label("Loại")->type("select_from_array")->options($this->mgroup());
        CRUD::column('url')->label("Liên kết");
        CRUD::column('parent_id')->label("Danh mục cha");

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    public function mgroup(): array
    {
        return [
            0 => 'Nhập link',
            1 => 'Trang chủ',
            2 => 'Trang giới thiệu',
            3 => 'Danh mục sản phẩm',
            4 => 'Trang công trình tiêu biểu',
            5 => 'Trang tin tức',
            6 => 'Trang liên hệ',
            7 => 'Tất cả danh mục sản phẩm',
        ];
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(MenuRequest::class);

        CRUD::addField([
            'name' => 'parent_id',
            'default' => 1,
            'type' => 'select2_nested',
            'label' => 'Menu cha',
            'model' => 'App\Models\Menu',
            'entity' => 'parent',
            'attribute' => 'title',
        ]);
        CRUD::field('title')->label("Tiêu đề");
        CRUD::field("mgroup")->label("Loại kiên kết")->type("select2_from_array")->options($this->mgroup());
        CRUD::addField([
            'name' => 'news_type',
            'type' => 'select2_from_array',
            'options' => $this->mgroup()
        ]);
        CRUD::field('url');

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
}
