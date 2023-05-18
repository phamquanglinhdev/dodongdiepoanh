<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::query()->truncate();
//        for ($i = 0; $i < 0; $i++) {
//            $title = fake()->text(100);
//            $news = array(
//                "title" => $title,
//                "slug" => Str::slug($title, "-"),
//                "description" => fake()->text(1000),
//                "body" => "<figure class=\"image image_resized\" style=\"width:23.86%;\"><img src=\"https://dodongdiepoanh.test/uploads/news/343555284_1298990017666140_2828860122205542360_n.jpg\"></figure><p>“Dù ai đi ngược về xuôi<br>Nhớ ngày giỗ tổ mùng 10 tháng 3”<br>Để kỷ niệm quốc lễ của dân tộc, Đồ đồng Điệp Oanh mang tới những sản phẩm đồ đồng chất lượng với nhiều ưu đãi hấp dẫn để khách hàng thoải mái chọn lựa và mua sắm các vật phẩm đón mừng đại lễ.<br>Ngày Giỗ Tổ Hùng Vương là dịp để gợi nhớ truyền thống “Uống nước nhớ nguồn”, bày tỏ lòng biết ơn sâu sắc tới các vị Vua Hùng đã có công dựng nước và các bậc tiền nhân đã kiên cường chiến đấu để giữ nước. Là con cháu mang dòng máu Lạc Hồng, dù ở thời kỳ nào hay ở bất cứ đâu, đây cũng là dịp quan trọng để hướng về cội nguồn và thực hành lời căn dặn của Chủ tịch Hồ Chí Minh: “Các Vua Hùng đã có công dựng nước - Bác cháu ta phải cùng nhau giữ lấy nước”<br>Nhân dịp Giỗ Tổ Hùng Vương, Đồ đồng Điệp Oanh xin kính chúc quý khách hàng một kỳ nghỉ lễ thật ý nghĩa với những giây phút vui vẻ, thư giãn bên người thân, gia đình và bạn bè ngập tràn niềm vui.&nbsp;<br>-----------------------------------------------------<br>Đồ đồng Điệp Oanh: Khu công nghiệp - Thị Trấn Lâm - Ý Yên - Nam Định<br>Fanpage : http://bit.ly/3GvUr8v<br>Website : dodongdiepoanh.com<br>Hotline tư vấn : 0949.806.083<br>Nghệ nhân ưu tú - Giám đốc : Vũ Duy Điệp - 0912.559.224</p>",
//                "body_2" => NULL,
//                "type_id" => rand(0, 1),
//                "author_id" => rand(1, 3),
//                "pin" => rand(0, 1),
//                "thumbnail" => "/img/blank_16_9.jpg",
//                "draft" => 0,
//                "status" => 1,
//                "view" => rand(10, 10000),
//            );
//            News::query()->create($news);
//        }

    }
}
