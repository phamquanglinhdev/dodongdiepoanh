<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageRequest;
use App\Repositories\AreaRepository;
use App\Repositories\PageRepository;
use App\ViewModels\Page\Object\PageStoreObject;
use App\ViewModels\Page\PageAreaViewModel;
use App\ViewModels\Page\PageEditViewModel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class PageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PageCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Page::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/page');
        CRUD::setEntityNameStrings('Trang', 'DS Trang');
        if (!permission("manager")) {
            $this->crud->denyAccess(["list", "create", "update", "delete"]);
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::addColumn([
            'name' => 'title',
            'type' => 'text',
            'label' => 'Tiêu đề',
        ]);
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
        CRUD::setValidation(PageRequest::class);


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
        if (!permission("manager")) {
            abort(403);
        }
        return view("vendor.backpack.page_add");
    }

    public function edit($id, PageRepository $pageRepository): View
    {
        if (!permission("manager")) {
            abort(403);
        }
        return view("vendor.backpack.page_edit", [
            'pageEditViewModel' => new PageEditViewModel($pageRepository->getById($id))
        ]);
    }

    public function store(Request $request, PageRepository $pageRepository): RedirectResponse
    {
        if (!permission("manager")) {
            abort(403);
        }
        $attribute = $request->except("_token");
        $object = new PageStoreObject($attribute["title"], $attribute['body']);
        $pageRepository->createPage($object->toArray());
        return redirect("/admin/page");
    }

    public function update(Request $request, $id, PageRepository $pageRepository): RedirectResponse
    {
        $collection = $request->except("_token", "_method");
        $page = $pageRepository->getById($id);
        $page->title = $collection['title'];
        $page->body = $collection["body"] ?? $page->body;
        $page->save();
        return redirect("/admin/page");
    }

    public function area(PageRepository $pageRepository, AreaRepository $areaRepository): View
    {
        if (!permission("manager")) {
            abort(403);
        }
        $pagesCollection = $pageRepository->getAllPages();
        $about_me = $areaRepository->getAboutMeArea();
        $rules = $areaRepository->getRulesArea();
        return \view("vendor.backpack.page_area", [
            'pageAreaViewModel' => new PageAreaViewModel(pages: $pagesCollection, about_me: $about_me, rules: $rules)
        ]);
    }

    public function pushArea(Request $request, AreaRepository $areaRepository, PageRepository $pageRepository): RedirectResponse
    {
        if (!permission("manager")) {
            abort(403);
        }
        $areasBags = $request->except("_token");
        $locate = $request["locate"];
        $pages = $request["page"];
        foreach ($pages as $page) {
            $pageModel = $pageRepository->getBuilder()->where("slug", $page)->firstOrFail();
            $areaRepository->pushPage(["title" => $pageModel["title"], "locate" => $locate, "url" => $pageModel["slug"]]);
        }
        return redirect("admin/page/area");
    }

    public function orderArea(Request $request, AreaRepository $areaRepository): bool
    {
        if (!permission("manager")) {
            abort(403);
        }
        $areaObject = $request->except("_token");
        foreach ($areaObject as $key => $item) {
            $areaRepository->getBuilder()->where("id", $item)->update(['order' => $key]);
        }
        return true;
    }

    public function removeArea(Request $request, AreaRepository $areaRepository): string
    {
        if (!permission("manager")) {
            abort(403);
        }
        $id = $request->id ?? -1;
        $id = str_replace("area_", "", $id);
        $areaModel = $areaRepository->getBuilder()->where("id", $id)->delete();
        return "$id";
    }
}
