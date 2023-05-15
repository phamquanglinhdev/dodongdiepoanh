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
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarLeftAlignExample"
            aria-controls="navbarLeftAlignExample"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars text-white"></i>
        </button>
        <a class="nav-link active d-lg-none d-block" aria-current="page" href="{{route("index")}}">
            <img alt="logo" src="https://dodongdiepoanh.com/assets/images/logo.png" style="width: 15em">
        </a>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center d-flex align-items-center w-100">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route("index")}}">
                        <img alt="logo" src="https://dodongdiepoanh.com/assets/images/logo.png" style="width: 15em">
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
            </ul>

            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="#">
                <i class="fab fa-facebook text-white"></i>
            </a>
            <a class="text-reset me-3" href="#">
                <i class="fab fa-youtube text-white"></i>
            </a>
        </div>
        <!-- Right elements -->
    </div>

    <!-- Container wrapper -->
</nav>
