@php
    use App\ViewModels\Setting\SettingViewModel;
    /**
    * @var SettingViewModel $settingViewModel
     */
    $facebook_page_message_code = $settingViewModel->getProperty("facebook_page_message_code")->getValue();
    $zalo_page_message_code = $settingViewModel->getProperty("zalo_page_message_code")->getValue();
    $business_phone = $settingViewModel->getProperty("business_phone")->getValue();
    $google_tag_manager = $settingViewModel->getProperty("google_tag_manager")->getValue();
    $google_tag_manager_noscript = $settingViewModel->getProperty("google_tag_manager_noscript")->getValue();
    $pin_category_ids = $settingViewModel->getProperty("pin_category_ids")->getValue();
    $selected_category = $settingViewModel->getCategoryRepository()
@endphp
@extends(backpack_view("blank"))
@section("after_styles")
    <link href="{{ asset('packages/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('packages/select2-bootstrap-theme/dist/select2-bootstrap.min.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection
@section("content")

    <section class="container-fluid">
        <h2>
            <span class="text-capitalize">Cài đặt</span>
        </h2>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-12 ">
                <div class="bg-white p-2 rounded px-3 pb-5 border">
                    <form action="{{route('setting.update',1)}}" method="POST" class="mt-2">
                        @method("PUT")
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold" for="facebook_page_message_code">Link gửi
                                        tin nhắn đến Fanpage</label>
                                    <input class="form-control" id="facebook_page_message_code" placeholder="Nhập link"
                                           name="facebook_page_message_code"
                                           value="{{$facebook_page_message_code}}">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="zalo_page_message_code" class="form-label font-weight-bold">Link gửi tin
                                        nhắn đến Zalo</label>
                                    <input class="form-control" id="zalo_page_message_code" placeholder="Nhập link"
                                           name="zalo_page_message_code"
                                           value="{{$zalo_page_message_code}}">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="business_phone" class="form-label font-weight-bold">SĐT Doanh
                                        nghiệp</label>
                                    <input class="form-control" id="business_phone" placeholder="Nhập link"
                                           name="business_phone"
                                           value="{{$business_phone}}">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="google_tag_manager" class="form-label font-weight-bold">Google Tag
                                        Manager (1)</label>
                                    <textarea class="form-control" rows="8" name="google_tag_manager"
                                              id="google_tag_manager">{{$google_tag_manager}}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="google_tag_manager_noscript" class="form-label font-weight-bold">Google
                                        Tag Manager (2)</label>
                                    <textarea class="form-control" rows="5" name="google_tag_manager_noscript"
                                              id="google_tag_manager_noscript">{{$google_tag_manager_noscript}}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label font-weight-bold">Ghim danh mục sản phẩm lên trang chủ</label>
                                <select
                                    name="pin_category_ids[]"
                                    id="pin_category_ids"
                                    style="width: 100%"
                                    class="form-control select2_multiple"
                                    {{ true ? 'multiple' : '' }}>
                                    <option value="">-</option>
                                    @foreach ($selected_category->getChildren() as $category)
                                        @include('components.setting_category',['category'=>$category])
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="saveActions" class="form-group">
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-success">
                                    <span class="la la-save" role="presentation" aria-hidden="true"></span> &nbsp;
                                    <span data-value="save_and_back">Lưu và Quay lại</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("after_scripts")
    <script src="{{ asset('packages/select2/dist/js/select2.full.min.js') }}"></script>
    @if (app()->getLocale() !== 'en')
        <script src="{{ asset('packages/select2/dist/js/i18n/' . app()->getLocale() . '.js') }}"></script>
    @endif
    <script>
        $(document).ready(
            function () {
                $("#pin_category_ids").select2({
                    maximumSelectionLength: 2
                });
            }
        )
    </script>
@endsection
