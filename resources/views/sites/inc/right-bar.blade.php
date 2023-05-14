@php
    use App\ViewModels\Category\RightBarViewModel;
    use \Illuminate\Support\Facades\Route;
    /**
    * @var RightBarViewModel $rightBarViewModel
     */
    $category_id = Route::getCurrentRoute()->parameters["category_id"]??null;
@endphp
<div class="bg-main py-3 px-3 text-white fw-bold">DANH MỤC SẢN PHẨM</div>
<div class="accordion accordion-borderless" id="categories-right-bar">
    @foreach($rightBarViewModel->getCategoryObject()->getChildren() as $category)
        @include("sites.inc.sub-category-sidebar",["category"=>$category])
    @endforeach
</div>
