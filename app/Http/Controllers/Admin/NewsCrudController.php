<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\View\View;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('Tin tức', 'news');
    }

    public function status(): array
    {
        return [
            0 => 'Đang chờ',
            1 => 'Đã đăng',
            2 => 'Đã bị hủy',
        ];
    }

    public function type(): array
    {
        return [
            0 => 'Tin tức thường',
            1 => 'Tin tức doanh nghiệp'
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
        CRUD::column('title')->label("Tiêu đề");
        CRUD::column('created_at')->label("Thời gian tạo");
        CRUD::column('updated_at')->label("Chỉnh sửa lần cuối");
        CRUD::column('draft')->label("Bản nháp")->type('check');
        CRUD::column('status')->label("Trạng thái")->options($this->status())->type("select_from_array");
        CRUD::column('thumbnail')->label("Ảnh bìa")->type('image');
        CRUD::column('type_id')->options($this->type())->type("select_from_array")->label("Loại tin tức");


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
        CRUD::setValidation(NewsRequest::class);

        CRUD::field('body');
        CRUD::field('body_2');
        CRUD::field('description');
        CRUD::field('draft');
        CRUD::field('status');
        CRUD::field('thumbnail');
        CRUD::field('title');
        CRUD::field('type_id');

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

    public function create(): View
    {
        return \view("vendor.backpack.add_post", [
            'postAddViewModel' => null
        ]);
    }
}
