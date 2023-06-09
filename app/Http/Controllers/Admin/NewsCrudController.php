<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use App\Repositories\TagRepository;
use App\ViewModels\News\NewsAddViewModel;
use App\ViewModels\News\NewsEditViewModel;
use App\ViewModels\News\Object\NewsStoreObject;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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
    public
    function setup()
    {
        CRUD::setModel(\App\Models\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('Tin tức', 'DS Tin tức');
        $this->crud->setCreateContentClass('col-md-12 bold-labels');
        if (!permission("author")) {
            $this->crud->denyAccess(["list", "create", "update", "delete"]);
        }
        if (backpack_auth()->check()) {
            if (backpack_user()->roles == "author") {
                $this->crud->query->where("author_id", backpack_user()->id);
            }
        }
        $this->crud->query->where("type_id", "!=", 3);
    }

    public
    function status(): array
    {
        return [
            0 => 'Đang chờ',
            1 => 'Đã đăng',
            2 => 'Đã bị hủy',
        ];
    }

    public
    function type(): array
    {
        return [
            0 => 'Tin tức doanh nghiệp',
            1 => 'Kiến thức đồ đồng'
        ];
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected
    function setupListOperation(): void
    {
        CRUD::column('title')->label("Tiêu đề");
        CRUD::column('author')->label("Tác giả");
        CRUD::column('created_at')->label("Thời gian tạo");
        CRUD::column('updated_at')->label("Chỉnh sửa lần cuối");
        CRUD::column('pin')->label("Ghim")->type('check');
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
    protected
    function setupCreateOperation(): void
    {


        CRUD::setValidation(NewsRequest::class);
        CRUD::field('title')->label("Tiêu đề");
        CRUD::field('slug')->type("hidden");
        CRUD::field('description')->label("Mô tả ngắn");
        CRUD::field('body')->type("adonis-editor");
        CRUD::field('pin')->type("switch")->label("Ghim bài viết");
        CRUD::field('draft')->type("switch")->label("Thư mục nháp");
        CRUD::field('status')->label("Trạng thái")->type("select_from_array")->options($this->status());
        CRUD::field('thumbnail')->type("image")->crop(true)->aspect_ratio(16 / 9);
        CRUD::addField([
            'name' => 'thumbnail',
            'type' => 'image',
            'crop' => true,
            'aspect_ratio' => 16 / 9,
            'upload' => true,
            'disk' => 'uploads'
        ]);
        CRUD::field('type_id')->label("Trạng thái")->type("select_from_array")->options($this->type());;

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
    protected
    function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

//    public
//    function create(TagRepository $tagRepository): View
//    {
//        return \view("vendor.backpack.add_post", [
//            'newsAddViewModel' => new NewsAddViewModel($tagRepository->listAll())
//        ]);
//    }
//
//    public function edit($id, NewsRepository $newsRepository, TagRepository $tagRepository): View
//    {
//        return \view("vendor.backpack.edit_post", [
//            'newsEditViewModel' => new NewsEditViewModel(news: $newsRepository->getNewById($id), tags: $tagRepository->listAll())
//        ]);
//    }
//
//    public
//    function store(NewsRequest $request, NewsRepository $newsRepository, TagRepository $tagRepository): RedirectResponse
//    {
//        $tagIds = [];
//        $collection = $request->except("_token");
//
//        if (isset($collection["tags"])) {
//            foreach ($collection["tags"] as $tagName) {
//                $tag = $tagRepository->findByName($tagName);
//                if ($tag) {
//                    $tagIds[] = $tag->id;
//                } else {
//                    /**
//                     * @var Model|Builder $tagCreate
//                     */
//                    $tagCreate = $tagRepository->getBuilder()->create(["name" => $tagName]);
//                    $tagIds[] = $tagCreate->id;
//                }
//            }
//        }
//        $newStoreObject = new NewsStoreObject(
//            author_id: backpack_user()->id,
//            title: $collection["title"],
//            body: $collection["body"],
//            type_id: $collection["type_id"] ?? 0,
//            draft: isset($collection["draft"]) ? 1 : 0,
//            pin: isset($collection['pin']) ? 1 : 0,
//            thumbnail: $collection['thumbnail'],
//            description: $collection["description"]
//        );
//        /**
//         * @var News $newsModel
//         */
//        $newsModel = $newsRepository->create($newStoreObject->toArray());
//        if ($collection["thumbnail"] instanceof UploadedFile) {
//            $newsModel->thumbnail = $newsRepository->uploadThumbnail($collection["thumbnail"]);
//            $newsModel->save();
//        }
//        $newsModel->Tags()->attach($tagIds);
//        return redirect("admin/news");
//    }
//
//    public function update(Request $request, NewsRepository $newsRepository, TagRepository $tagRepository, int $id): RedirectResponse
//    {
//        /**
//         * @var News $newsModel
//         */
//        $newsModel = $newsRepository->getNewById($id);
//
//        $newUpdateObject = $request->except("_token", "_method");
//        $newsModel->title = $newUpdateObject["title"] ?? $newsModel->title;
//        $newsModel->body = $newUpdateObject["body"] ?? $newsModel->body;
//        $newsModel->pin = isset($newUpdateObject["pin"]) ? 1 : 0;
//        $newsModel->draft = isset($newUpdateObject["draft"]) ? 1 : 0;
//        $newsModel->type_id = $newUpdateObject["type_id"] ?? $newsModel->type_id;
//        $newsModel->description = $newUpdateObject["description"] ?? $newsModel->description;
//        if (isset($newUpdateObject["thumbnail"])) {
//            if ($newUpdateObject["thumbnail"] instanceof UploadedFile) {
//                $newsModel->thumbnail = $newsRepository->uploadThumbnail($newUpdateObject["thumbnail"]);
//            }
//        }
//        $tagIds = [];
//        if (isset($newUpdateObject["tags"])) {
//            foreach ($newUpdateObject["tags"] as $tagName) {
//                $tag = $tagRepository->findByName($tagName);
//                if ($tag) {
//                    $tagIds[] = $tag->id;
//                } else {
//                    /**
//                     * @var Model|Builder $tagCreate
//                     */
//                    $tagCreate = $tagRepository->getBuilder()->create(["name" => $tagName]);
//                    $tagIds[] = $tagCreate->id;
//                }
//            }
//        }
//        $newsModel->Tags()->sync($tagIds);
//        $newsModel->save();
//        return redirect("admin/news");
//    }
}
