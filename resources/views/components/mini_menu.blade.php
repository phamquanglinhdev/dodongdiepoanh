@php
    use App\ViewModels\Menu\MenuViewModel;
    /**
    * @var MenuViewModel $menuViewModel
    */
    $menuObject = $menuViewModel->getMenuObject();
@endphp
<div class="overflow-scroll bg-main d-lg-none d-md-block pb-2">
    <div class="bg-main text-reset" style="white-space: nowrap">
        @foreach($menuObject->getChildren() as $menu)
           @if($menu->getTitle()!="Sản phẩm")
                @include("sites.inc.sub_mini_menu",["menuObject"=>$menu])
           @endif
        @endforeach
    </div>
</div>
