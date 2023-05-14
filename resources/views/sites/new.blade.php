@php @endphp
@extends("layouts.app")
@section("title")
    Chi tiết bài viết
@endsection
@section("content")
    <div class="container-fluid pt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a class="text-main fw-bold" href="{{route("index")}}">Tin tức thường</a>
                </li>
                <li class="breadcrumb-item active"
                    aria-current="page">{{Str::limit("Bài viết mẫu với tiêu đề này không dài lắm nhưng nếu dài có thể cắt bớt đi",200)}}</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-block border">
                @include("components.top-news-2")
            </div>
            <div class="col-lg-9 col-12">
                <div class="h2 text-main text-uppercase fw-bold">
                    Bài viết mẫu với tiêu đề này không dài lắm nhưng nếu dài có thể cắt bớt đi
                </div>
                <hr>
                <div>
                    <i class="fas fa-clock"></i>
                    <span class="">Ngày đăng tải: {{\Illuminate\Support\Carbon::now()->isoFormat("D/M/Y")}} </span>
                </div>
                <hr>
                <div class="content">
                    Đồ Đồng Điệp Oanh vinh dự thi công bức Phù Điêu tại khu tưởng niệm liệt sĩ Mậu Thân 1968 (Title)

                    Khu tưởng niệm liệt sĩ Mậu Thân 1968 là một công trình mang tầm vóc lịch sử. Đây không chỉ là nơi
                    tôn vinh, tri ân những anh hùng liệt sĩ, mà còn mang ý nghĩa giáo dục truyền thống cách mạng đến các
                    cán bộ, Đảng viên, các tầng lớp nhân dân về ý nghĩa lớn lao của cuộc Tổng tiến công, nổi dậy vào
                    Xuân Mậu Thân 1968.

                    Đồ đồng Điệp Oanh vô cùng tự hào khi được trở thành đơn vị thi công bức Phù Điêu tại khu tưởng niệm
                    liệt sĩ Mậu Thân 1968. Công trình thể hiện chủ đề về “Bản anh hùng ca bi tráng”, khắc họa sâu sắc
                    những chiến công hào hùng, cũng như sự hy sinh anh dũng của những lực lượng dân công hỏa tuyến,
                    chiến sĩ giải phóng quân, chiến sĩ biệt động và nhân dân miền Nam trong cuộc tổng tấn công Mậu Thân
                    1968.

                    Tổng thể bức Phù Điêu tại khu tưởng niệm liệt sĩ Mậu Thân 1968

                    Bố cục tổng quan của bức phù điêu chính là hình tượng tia chớp sáng lòa, diễn tả chân thực tiếng
                    vang chấn động toàn thế giới và mang đến “một đòn sét đánh” bất ngờ cho đế quốc Mỹ. Công trình sở
                    hữu chiều dài lên đến 81m và chiều cao nhất là 9m, trở thành địa điểm thăm quan nổi bật, phục vụ nhu
                    cầu thăm quan, thắp hương của nhân dân khi ghé thăm khi đến với khu tưởng niệm liệt sĩ Mậu Thân
                    1968.

                    Các chi tiết của bức Phù Điêu được chế tác tỉ mỉ bởi các thợ thủ công lành nghề

                    Ngày 9/10/2020, UBND huyện Bình Chánh (TP.HCM) đã tổ chức lễ khánh thành thi công dự án những hạng
                    mục kiến trúc cảnh quan tại khu truyền thống cách mạng của cuộc tổng tiến công và nổi dậy vào Xuân
                    Mậu Thân 1968.

                    Theo ông Đào Gia Vượng (chủ tịch UBND huyện Bình Chánh) cho biết: Công trình được tọa lạc tại xã Tân
                    Nhật, với quy mô dự án rộng khoảng 12ha, có tổng kinh phí đầu tư lên đến 590 tỷ đồng từ ngân sách
                    của TP, được khởi công từ ngày 1/2/2013.

                    Đây được đánh giá là một trong những dự án trọng điểm nhằm chào mừng Đại hội Đại biểu Đảng bộ huyện
                    Bình Chánh nhiệm kỳ 2015-2020, đồng thời còn là công trình được đăng ký hoàn thành nhằm chào mừng
                    Đại hội đại biểu Đảng bộ TP.HCM lần thứ XI nhiệm kỳ 2020-2025.

                    Công trình mang đậm ý nghĩa lịch sử, tưởng nhớ lại cuộc tổng tấn công và nổi dậy vào xuân Mậu Thân
                    1968 của quân đội Việt Nam - một sự kiện có tầm vóc chiến lược, đã giáng đòn quyết định lên ý chí
                    xâm lược của thực dân Mỹ. Đây là cuộc tổng tấn công mang dấu mốc quan trọng, thể hiện chủ trương
                    chiến lược đúng đắn của Đảng, mở ra cục diện mới cho công cuộc kháng chiến chống Mỹ, cứu nước của
                    dân tộc ta.


                    Công trình tưởng niệm liệt sĩ Mậu Thân mang đậm ý nghĩa lịch sử

                    Với ý nghĩa lớn lao ấy, công trình khu tưởng niệm liệt sĩ Mậu Thân 1968 chính là nơi để các cá nhân,
                    tổ chức đến tưởng nhớ và được giáo dục sâu sắc về chiến công của những vị anh hùng liệt sĩ đã hy
                    sinh oanh liệt trong cuộc chiến tổng tấn công vào mùa Xuân năm 1968.

                    Khi ghé thăm nơi đây, quần chúng nhân dân sẽ được chiêm ngưỡng những hiện vật, tài liệu, những thước
                    phim hỗ trợ cho quá trình học tập, nghiên cứu, tham quan,...

                    Một lần nữa, Đồ Đồng Điệp Oanh vô cùng tự hào và cảm ơn chủ đầu tư, các ban ngành đã tin tưởng.
                    Chúng tôi cam kết luôn cung cấp những sản phẩm có “tâm”, dịch vụ xứng tầm đến quý khách hàng.

                    Nếu quý vị đang quan tâm đến các sản phẩm đồ đồng với nguyên liệu thanh khiết 100%, hãy liên hệ trực
                    tiếp với Đồ Đồng Điệp Oanh để được tư vấn tận tình!
                </div>
                <hr>
                <div>
                    <a href="#" class="text-reset">
                        <span>Đọc thêm: Bài viết mẫu nữa nè</span>
                        <i class="fas fa-arrow-alt-circle-right"></i>
                    </a>
                    <div class="text-main">
                        <i class="fas fa-tags"></i>
                        <span>Tags:</span>
                        <a href="#" class="text-reset">
                            Bài viết
                        </a>,
                        <a href="#" class="text-reset">
                            Khoa học
                        </a>,
                        <a href="#" class="text-reset">
                            Đúc đồng
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
