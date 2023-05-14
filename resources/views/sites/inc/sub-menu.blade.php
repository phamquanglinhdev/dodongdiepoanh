@php
    use App\ViewModels\Menu\Object\MenuObject;
        /**
         * @var MenuObject $menu
         */
@endphp
@if($menu->getChildren()==[])
    <li>
        <a class="dropdown-item" href="{{$menu->getUrl()}}">{{$menu->getTitle()}}</a>
    </li>
@else
    <li>
        <a class="dropdown-item" href="#">
            {{$menu->getTitle()}}
        </a>
        <ul class="dropdown-menu dropdown-submenu">
            @foreach($menu->getChildren() as $subMenu)
                @include("sites.inc.sub-menu",["menu"=>$subMenu])
            @endforeach

        </ul>
    </li>
@endif
