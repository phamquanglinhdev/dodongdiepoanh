@php
    use App\ViewModels\Category\Object\CategoryObject;
        /**
         * @var CategoryObject $category
         */
@endphp
@if($category->getChildren()==[])
    <a href="{{$category->getUrl()}}" class="px-4 py-3 text-reset d-flex  collapsed text-uppercase fw-bold align-items-center">
        <i class="fas fa-list"></i><span class="px-2"> {{$category->getTitle()}}</span>
    </a>
@else
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-{{$category->getId()}}">
            <button class="accordion-button collapsed text-uppercase fw-bold" type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#item-{{$category->getId()}}"
            >
                <i class="fas fa-list"></i><span class="px-2"> {{$category->getTitle()}}</span>
            </button>
        </h2>
        <div id="item-{{$category->getId()}}" class="accordion-collapse collapse">
            <div class="accordion-body">
                @foreach($category->getChildren() as $subCategory)
                    @include("sites.inc.sub-category-sidebar",["category"=>$subCategory])
                @endforeach
            </div>
        </div>
    </div>
@endif

