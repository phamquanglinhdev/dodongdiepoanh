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

        .sortable li {
            padding: 5px !important;
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
                                    <i class="p-1 las la-arrows-alt"></i>
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
                                    <i class="p-1 las la-arrows-alt"></i>
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
    <div class="container-fluid my-5">

        <div class="row  h-100">
            <div class="col-md-6 h-100">
                <div class="p-2 bg-white rounded  h-100">
                    <form action="#" method="POST">
                        <div class="font-weight-bold my-2">Nội dung chân trang</div>
                        <div id="footer_description"></div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 h-100">
                <div class="p-2 bg-white rounded h-100">
                    <form action="#" method="POST">
                        <div class="font-weight-bold my-2">Nhúng bản đồ</div>
                        <input class="form-control my-2" id="map_code" placeholder="Mã nhúng">
                        <input class="form-control my-2" name="map_code" id="map_code_src" hidden>
                        <div class="rounded border embed-responsive embed-responsive-16by9">
                            <iframe
                                id="preview_map_code"
                                class="embed-responsive-item"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.1637168548546!2d105.88541947593966!3d20.986073489242074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aebcaf395211%3A0x76fb5f949904beeb!2zNTYgUC4gTmFtIETGsCwgTMSpbmggTmFtLCBIb8OgbmcgTWFpLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1684344095220!5m2!1svi!2s"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </form>
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
    @include("sites.inc.ckeditor5",["id"=>"footer_description"])
    <script>
        $("#map_code").keyup(function (e) {
            const map_code = e.target.value
            const source = $(map_code).attr("src")
            $("#preview_map_code").attr("src", source)
            $("#map_code_src").val(source)
        })
    </script>
@endsection

