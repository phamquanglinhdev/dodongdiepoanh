@php
    use App\ViewModels\Menu\Object\MenuObject;
    /**
    *@var MenuObject $menuObject
    */
@endphp
@if($menuObject->getChildren()==[])
    <a href="{{$menuObject->getUrl()}}" class="me-1 px-1">
        <span class="small text-white">
            {{$menuObject->getTitle()}}
        </span>
    </a>
@else
    @foreach($menuObject->getChildren() as $sub)

        @include("sites.inc.sub_mini_menu",["menuObject"=>$sub])
    @endforeach
@endif
