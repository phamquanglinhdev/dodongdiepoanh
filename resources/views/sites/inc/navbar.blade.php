@php
    use App\ViewModels\Menu\MenuViewModel;
    /**
* @var MenuViewModel $menuViewModel
 */
@endphp
<nav class="sticky-top shadow text-uppercase navbar navbar-expand-lg bg-main ">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <div class="d-flex w-lg-auto  justify-content-between">
            <div>
                <a class="nav-link active d-lg-none d-block`" aria-current="page" href="{{route("index")}}">
                    <img alt="logo" src="{{asset("img/logo.png")}}" style="width: 15em">
                </a>
            </div>
            <div class="">
                <button type="button" class="shadow-0 btn bg-main text-white d-lg-none d-md-block rounded-0 " data-mdb-toggle="modal"
                        data-mdb-target="#exampleModal">
                    <i class="fas fa-bars fa-2x"></i>
                </button>
            </div>
        </div>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center d-flex align-items-center w-100">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link active" aria-current="page" href="{{route("index")}}">
                        <img alt="logo" src="{{asset("img/logo.png")}}" style="width: 15em">
                    </a>
                </li>
                @foreach($menuViewModel->getMenuObject()->getChildren() as $menu)
                    @if($menu->getChildren()==[])
                        <li class="nav-item fw-bold ">
                            <a class="nav-link text-white " href="{{$menu->getUrl()??"#"}}">{{$menu->getTitle()}}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white fw-bold" href="#" id="{{$menu->getTitle()}}"
                               role="button"
                               data-mdb-toggle="dropdown" aria-expanded="false">
                                {{$menu->getTitle()}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach($menu->getChildren() as $subMenu)
                                    @include("sites.inc.sub-menu",["menu"=>$subMenu])
                                @endforeach
                            </ul>

                        </li>

                    @endif
                @endforeach
               <li class="ml-3">
                   @include("components.search_bar")
               </li>
            </ul>

            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
        <!-- Right elements -->
    </div>

    <!-- Container wrapper -->

</nav>
{{--@include("sites.inc.right-bar")--}}
<div class="d-lg-none d-block">
    @include("components.search_bar")
</div>
@include("components.mini_menu")
