<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StructRequest;
use App\Models\Setting;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Prologue\Alerts\Facades\Alert;

/**
 * Class StructCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StructCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
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
        CRUD::setModel(\App\Models\Struct::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/struct');
        CRUD::setEntityNameStrings('Công trình tiêu biểu', 'Công trình tiêu biểu');
        $this->crud->denyAccess(["list", "update"]);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {


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
        CRUD::setValidation(StructRequest::class);
        CRUD::addField([
            'name' => 'cctb_heading_1',
            "label" => "Tiêu đề trên",
            'value' => Setting::query()->where("name", "cctb_heading_1")->first()->value
        ]);
        CRUD::addField([
            'name' => 'cctb_heading_2',
            "label" => "Tiêu đề dưới",
            'value' => Setting::query()->where("name", "cctb_heading_2")->first()->value
        ]);
        CRUD::addField([
            'name' => 'cctb_text',
            "label" => "Văn bản",
            "type" => 'textarea',
            "attributes" => [
                "rows" => 5,
            ],
            'value' => Setting::query()->where("name", "cctb_text")->first()->value
        ]);
        CRUD::addField([
            'name' => 'cctb_image',
            "label" => "Ảnh",
            "type" => 'upload',
            "upload" => true,
            "disk" => "uploads",
            'value' => Setting::query()->where("name", "cctb_image")->first()->value
        ]);
        CRUD::addField([
            'name' => 'cctb_image_alt',
            "label" => "Chú thích ảnh",
            "type" => 'text',
            'value' => Setting::query()->where("name", "cctb_image_alt")->first()->value
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

    public function store(Request $request)
    {
        $dataUpdate = $request->except("_token");
        foreach ($dataUpdate as $key => $value) {
            if ($value instanceof UploadedFile) {
                $value->move(public_path() . "/uploads/cttb/", $value->getClientOriginalName());
                $url = "/uploads/cttb/" . $value->getClientOriginalName();
                Setting::query()->where("name", $key)->update(['value' => $url]);
            } else {
                Setting::query()->where("name", $key)->update(['value' => $value]);
            }

        }
        Alert::success("Thành công");
        return redirect()->back();
    }
}
