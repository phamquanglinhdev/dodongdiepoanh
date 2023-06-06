<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TopProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class TopProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TopProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\TopProduct::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/top-product');
        CRUD::setEntityNameStrings('top product', 'top products');
        $this->crud->denyAccess(["list", "show", "create", "store"]);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('category_id');
        CRUD::column('code');
        CRUD::column('created_at');
        CRUD::column('description');
        CRUD::column('material');
        CRUD::column('name');
        CRUD::column('promote');
        CRUD::column('size');
        CRUD::column('status');
        CRUD::column('thumbnail_1');
        CRUD::column('thumbnail_2');
        CRUD::column('thumbnail_3');
        CRUD::column('thumbnail_4');
        CRUD::column('thumbnail_5');
        CRUD::column('updated_at');
        CRUD::column('view');

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
    protected function setupCreateOperation()
    {
        CRUD::setValidation(TopProductRequest::class);
        CRUD::addField([
            'name' => 'promote_product',
            'label' => 'Sản phẩm nổi bật',
            'value' =>Product::query()->where("promote", 1)->get()->pluck( "id")->toArray() ,
            'type' => 'select2_from_array',
            'options' => Product::query()->get()->pluck("name", "id")->toArray(),
            'allows_null' => true,
            'allows_multiple' => true,
        ]);
        $select_keys = json_decode(Setting::query()->where("name", "pin_category_ids")->first()->value);
        $category_option = Category::query()->get()->pluck("name", "id")->toArray();


        CRUD::addField([
            'name' => 'pin_category_ids',
            'label' => 'Danh mục nổi bật',
            'value' => $select_keys,
            'type' => 'select2_from_array',
            'options' => $category_option,
            'allows_null' => true,
            'allows_multiple' => true,
        ]);

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

    protected function update(): RedirectResponse
    {
        $data = $this->crud->getRequest()->input();
        $promote_products = $data["promote_product"];
        Product::query()->update(["promote" => 0]);
        foreach ($promote_products as $product) {
            Product::query()->where("id", $product)->update(["promote" => 1]);
        }
        $pin_category_ids = $data["pin_category_ids"];
        Setting::query()->where("name", "pin_category_ids")->update(["value" => $pin_category_ids]);
        return redirect("admin/top-product/1/edit");
    }
}
