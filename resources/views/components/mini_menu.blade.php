@php
    use App\ViewModels\Menu\MenuViewModel;
    /**
    * @var MenuViewModel $menuViewModel
    */
    $menuObject = $menuViewModel->getMenuObject();
@endphp
<div class="overflow-scroll bg-main d-lg-none d-md-block">
    <div class="bg-main text-reset" style="white-space: nowrap">
        @foreach($menuObject->getChildren() as $menu)
            <a href="{{$menu->getUrl()}}" class="me-1 px-2">
        <span class="small text-white">
            {{$menu->getTitle()}}
        </span>
            </a>
        @endforeach
    </div>
</div>
