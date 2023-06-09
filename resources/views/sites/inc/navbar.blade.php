@php
    use App\ViewModels\Menu\MenuViewModel;
    /**
* @var MenuViewModel $menuViewModel
 */
@endphp
<style>
    @media (max-width: 992px) {
        .top-nav{
            width: 100%!important;
        }
    }
</style>
<nav class="sticky-top shadow text-uppercase navbar navbar-expand-lg bg-main ">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <div class="d-flex w-lg-auto top-nav justify-content-between">
            <div>
                <a class="nav-link active d-lg-none d-block`" aria-current="page" href="{{route("index")}}">
                    <img alt="logo" src="{{asset("img/logo.png")}}" style="width: 15em">
                </a>
            </div>
            <div class="">
                <button type="button" class="shadow-0 btn bg-main text-white d-lg-none d-md-block rounded-0 "
                        data-mdb-toggle="modal"
                        data-mdb-target="#right-bar">
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
                            <a class="nav-link dropdown-toggle text-white fw-bold"
                               id="{{$menu->getTitle()}}"
                               role="button"
                               onclick="showNav('sub_{{$menu->getTitle()}}')"
                               data-mdb-toggle="dropdown"
                               aria-expanded="false">
                                {{$menu->getTitle()}}
                            </a>
                            <ul class="dropdown-menu" id="sub_{{$menu->getTitle()}}"
                                aria-labelledby="{{$menu->getTitle()}}">
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
@push("page_js")
    {{--    <script>--}}
    {{--        function showNav(id) {--}}
    {{--            const uls = document.getElementsByClassName("dropdown-menu");--}}
    {{--            for (let i = 0; i < uls.length; i++) {--}}
    {{--                uls.item(i).style.display = "none"--}}
    {{--            }--}}
    {{--            const item = document.getElementById(id)--}}
    {{--            if (item.style.display === "none") {--}}
    {{--                item.style.display = "block"--}}
    {{--            } else {--}}
    {{--                item.style.display = "none"--}}
    {{--            }--}}
    {{--        }--}}
    {{--    </script>--}}
@endpush
