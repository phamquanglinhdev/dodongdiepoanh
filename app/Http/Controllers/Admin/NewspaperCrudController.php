<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewspaperRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NewspaperCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewspaperCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Newspaper::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/newspaper');
        CRUD::setEntityNameStrings('Báo chí', 'Báo chí');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title')->label("Tiêu đề");
        CRUD::column('body')->label("URL")->type("link");

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
        CRUD::setValidation(NewspaperRequest::class);

        CRUD::field('title')->label("Tiêu đề");
        CRUD::field('description')->label("Mô tả ngắn")->type("textarea");
        CRUD::field('body')->label("URL")->type("text")->prefix("https://");
        CRUD::field("type_id")->type("hidden")->default(3);
        CRUD::field("thumbnail")->type("browse")->label("Ảnh thumbnail");
        CRUD::field("slug")->type("hidden")->default("_");
        CRUD::field("pin")->type("switch")->label("Ghim lên đầu");
        CRUD::field("draft")->type("switch")->label("Bản nháp");

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
