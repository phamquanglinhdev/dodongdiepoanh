@php
    use App\ViewModels\Category\Object\CategoryObject;
        /**
         * @var CategoryObject $category
         */
@endphp
@if($category->getChildren()==[])
    @if(in_array($category->getId(),json_decode($pin_category_ids)))
        <option value="{{$category->getId()}}"
                selected>{{ $category->getTitle() }}</option>
    @else
        <option
            value="{{$category->getId()}}">{{ $category->getTitle() }}</option>
    @endif
@else
    @foreach($category->getChildren() as $child)
        @include("components.setting_category",["category"=>$child])
    @endforeach
@endif
