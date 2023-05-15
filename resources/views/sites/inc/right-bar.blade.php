@php
    use App\ViewModels\Category\RightBarViewModel;
    use \Illuminate\Support\Facades\Route;
    /**
    * @var RightBarViewModel $rightBarViewModel
     */
    $category_id = Route::getCurrentRoute()->parameters["category_id"]??null;
@endphp
<div class="border h-100 shadow">
    <div class="bg-main py-3 px-3 text-white fw-bold">DANH MỤC SẢN PHẨM</div>
    <div class="accordion accordion-borderless" id="categories-right-bar">
        @foreach($rightBarViewModel->getCategoryObject()->getChildren() as $category)
            @include("sites.inc.sub-category-sidebar",["category"=>$category])
        @endforeach
    </div>
</div>
@push("modal")
    <!-- Button trigger modal -->
    <div style="position: fixed;bottom: 0;left: 0" class="mt-4">
        <button type="button" class="btn bg-main text-white d-lg-none d-md-block rounded-0 " data-mdb-toggle="modal"
                data-mdb-target="#exampleModal">
            <i class="fas fa-list"></i> Danh mục
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="bg-main py-3 px-3 text-white fw-bold">DANH MỤC SẢN PHẨM</div>
                <div class="accordion accordion-borderless" id="categories-right-bar">
                    @foreach($rightBarViewModel->getCategoryObject()->getChildren() as $category)
                        @include("sites.inc.sub-category-sidebar",["category"=>$category])
                    @endforeach
                    <div class="text-center">
                        <button type="button" class="rounded-0 btn bg-main text-white" data-mdb-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
