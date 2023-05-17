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

        .sortable {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
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
            <div class="col-md-4">
                <div class="bg-white h-100 p-3">
                    <div class="text-center h4 text-uppercase font-weight-bold">Về chúng tôi</div>
                    <ul id="about_me_area" class="sortable">
                        @foreach($pageAreaViewModel->getAboutMe() as $area)
                            <li id="{{$area->getId()}}"
                                class="list-group-item w-100 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="p-2">
                                        <i class="p-1 las la-arrows-alt"></i>
                                    </div>
                                    <div>
                                        <span class="font-weight-bold">{{$area->getTitle()}}</span>
                                        <small class="font-italic">{{$area->getSlug()}}</small>
                                    </div>
                                </div>
                                <div id="remove_{{$area->getId()}}" style="cursor: pointer;align-self: end"
                                     class="remove_item">
                                    <i id="area_{{$area->getId()}}" class="las la-times-circle text-danger la-2x"></i>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white h-100 p-3">
                    <div class="text-center h4 text-uppercase font-weight-bold">Điều khoản</div>
                    <ul id="rules_area" class="sortable">
                        @foreach($pageAreaViewModel->getRules() as $area)
                            <li id="{{$area->getId()}}"
                                class="list-group-item w-100 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="p-2">
                                        <i class="p-1 las la-arrows-alt"></i>
                                    </div>
                                    <div>
                                        <span class="font-weight-bold">{{$area->getTitle()}}</span>
                                        <small class="font-italic">{{$area->getSlug()}}</small>
                                    </div>
                                </div>
                                <div id="remove_{{$area->getId()}}" style="cursor: pointer;align-self: end"
                                     class="remove_item">
                                    <i id="area_{{$area->getId()}}" class="las la-times-circle text-danger la-2x"></i>
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
            $("#about_me_area").sortable({
                update: function () {
                    const aaa = $(this).sortable('toArray')
                    $.ajax({
                        url: "{{route("page.area.order")}}",
                        type: "POST",
                        data: {...aaa, _token: "{{csrf_token()}}"},
                        success: function (data) {
                            console.log(data)
                        }
                    })
                }
            });

        });
        $(function () {
            $("#rules_area").sortable({
                update: function () {
                    const bbb = $(this).sortable('toArray')
                    $.ajax({
                        url: "{{route("page.area.order")}}",
                        type: "POST",
                        data: {...bbb, _token: "{{csrf_token()}}"},
                        success: function (data) {
                            console.log(data)
                        }
                    })
                }
            });
        });
        $(".remove_item").click((e) => {
            console.log()
            $.ajax({
                url: "{{route("page.area.remove")}}",
                type: "POST",
                data: {id: e.target.id, _token: "{{csrf_token()}}"},
                success: function (data) {
                    $("#" + data).remove()
                }
            })
        })
    </script>
@endsection

