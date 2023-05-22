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
    <a
        class="dropdown-toggle me-1 px-1 text-white"
        href="#"
        role="button"
        id="{{$menuObject->getTitle()}}"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
    >
       <span class="small text-white">
            {{$menuObject->getTitle()}}
        </span>
    </a>

    <ul class="dropdown-menu" aria-labelledby="{{$menuObject->getTitle()}}">
        @foreach($menuObject->getChildren() as $sub)
            <li>
                @include("sites.inc.sub_mini_menu",["menuObject"=>$sub])
            </li>
        @endforeach
    </ul>

@endif
<style>
    .dropdown-menu li a span{
        color: black!important;
    }
</style>
