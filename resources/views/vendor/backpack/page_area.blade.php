@php
    use App\ViewModels\Page\PageAreaViewModel;
    /**
    * @var PageAreaViewModel $pageAreaViewModel;
     */
@endphp
@extends(backpack_view("blank"))
@section("after_styles")
    <style>
        .area_page {
            cursor: pointer;
        }
        .sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
    </style>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="h-100 bg-white p-3">
                    <form action="{{route("page.area.push")}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="locate">Vị trí trang:</label>
                            <select class="form-control" name="locate" id="locate">
                                <option value="about_me">Về chúng tôi</option>
                                <option value="rules">Điều khoản</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="page_area">Chọn trang:</label>
                            @foreach($pageAreaViewModel->getPages() as $page)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="page[]"
                                           value="{{$page->getSlug()}}"
                                           id="{{$page->getSlug()}}">
                                    <label class="form-check-label" for="{{$page->getSlug()}}">
                                        {{$page->getTitle()}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-success">
                            <i class="las la-save"></i>Thêm vào
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white h-100 p-3">
                    <div class="text-center h4 text-uppercase font-weight-bold">Về chúng tôi</div>
                    <ul id="about_me_area" class="sortable">
                        @foreach($pageAreaViewModel->getAboutMe() as $area)
                            <li class="list-group-item w-100 d-flex align-items-center">
                                <div class="p-2">
                                    <i class="p-1 las la-arrows-alt"></i>
                                </div>
                                <div>
                                    <span class="font-weight-bold">{{$area->getTitle()}}</span>
                                    <small class="font-italic d-block">{{$area->getSlug()}}</small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white h-100 p-3">
                    <div class="text-center h4 text-uppercase font-weight-bold">Điều khoản</div>
                    <ul id="about_me_area" class="sortable">
                        @foreach($pageAreaViewModel->getRules() as $area)
                            <li class="list-group-item w-100 d-flex align-items-center">
                                <div class="p-2">
                                    <i class="p-1 las la-arrows-alt"></i>
                                </div>
                                <div>
                                    <span class="font-weight-bold">{{$area->getTitle()}}</span>
                                    <small class="font-italic d-block">{{$area->getSlug()}}</small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("after_scripts")
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#about_me_area").sortable();
        });
    </script>
@endsection

