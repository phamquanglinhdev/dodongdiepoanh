{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
@if(permission("admin"))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i
                class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('menu') }}"><i class="nav-icon la la-list"></i> Menu</a>
    </li>
@endif
@if(permission("manager"))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="nav-icon la la-list"></i>
            Danh mục sản phẩm</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="nav-icon la la-boxes"></i>
            Sản
            phẩm</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i
                class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
@endif
@if(permission("author"))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('news') }}"><i class="nav-icon la la-newspaper"></i>
            Bài
            viết</a></li>

    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('newspaper') }}"><i class="nav-icon la la-newspaper"></i>Báo chí</a></li>

@endif
@if(permission("admin"))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> Người
            dùng</a></li>
@endif

@if(permission("manager"))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('project') }}"><i class="nav-icon la la-building"></i> Công trình</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('banner') }}"><i class="nav-icon la la-images"></i> Banner/Slider</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('page') }}"><i class="nav-icon la la-pager"></i>
            Trang</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('page/area') }}"><i class="nav-icon la la-external-link-square-alt"></i>
           Footer - Cuối trang</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('setting') }}"><i class="nav-icon la la-cog"></i> Cài đặt</a></li>
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('backup') }}'><i class='nav-icon la la-hdd-o'></i> Backups</a></li>
@endif
{{--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('tag') }}"><i class="nav-icon la la-question"></i> Tags</a></li>--}}





