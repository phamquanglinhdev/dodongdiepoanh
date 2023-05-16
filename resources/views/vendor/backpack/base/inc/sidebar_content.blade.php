{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i
            class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('menu') }}"><i class="nav-icon la la-list"></i> Menu</a>
</li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="nav-icon la la-list"></i>
        Danh mục sản phẩm</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="nav-icon la la-boxes"></i> Sản phẩm</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i>
        <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('news') }}"><i class="nav-icon la la-question"></i> News</a></li>