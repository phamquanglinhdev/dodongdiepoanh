@php
    use App\ViewModels\Category\RightBarViewModel;
    use \Illuminate\Support\Facades\Route;
    /**
    * @var RightBarViewModel $rightBarViewModel
     */
    $category_id = Route::getCurrentRoute()->parameters["category_id"]??null;
@endphp
<div class="border h-100 shadow">
    <div class="bg-main py-3 px-3 text-white fw-bold">
        DANH MỤC SẢN PHẨM
    </div>
    <div class="accordion accordion-borderless" id="categories-right-bar">
        @foreach($rightBarViewModel->getCategoryObject()->getChildren() as $category)
            @include("sites.inc.sub-category-sidebar",["category"=>$category])
        @endforeach
    </div>
</div>
@push("modal")
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade bg-white" id="right-bar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="bg-main py-3 px-3 text-white d-flex justify-content-between align-items-center">
                    <div class="fw-bold">DANH MỤC SẢN PHẨM</div>
                    <span>
                        <a type="button" class="px-2 text-white" data-mdb-dismiss="modal">
                         <i class="fas fa-times"></i>
                         </a>
                    </span>
                </div>

                <div class="accordion accordion-borderless" id="categories-right-bar">
                    @foreach($rightBarViewModel->getCategoryObject()->getChildren() as $category)
                        @include("sites.inc.sub-category-sidebar",["category"=>$category])
                    @endforeach
                    <div class="text-center">
                        <button type="button" class="rounded-0 btn bg-main text-white" data-mdb-dismiss="modal">Đóng
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
