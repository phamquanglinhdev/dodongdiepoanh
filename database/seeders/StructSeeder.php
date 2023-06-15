<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;

class StructSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::query()->create([
            'name' => 'cctb_heading_1',
            'setting_type' => 'text',
            'value' => 'ĐÚC ĐỒNG DIỆP OANH',
            'active' => 1
        ]);
        Setting::query()->create([
            'name' => 'cctb_heading_2',
            'setting_type' => 'text',
            'value' => 'ĐÚC ĐỒNG GIA TRUYỀN',
            'active' => 1
        ]);
        Setting::query()->create([
            'name' => 'cctb_text',
            'setting_type' => 'text',
            'value' => 'Doanh nghiệp Đồ đồng Điệp Oanh là một trong những đơn vị đúc đồng và chế tác đồ đồng lớn của làng nghề tại TT.Lâm - Ý Yên - Nam Định. Cơ sở sản xuất gồm ba phân xưởng chính cùng nhiều xưởng vệ tinh. Sở hữu một đội ngũ các thợ giỏi và nghệ nhân xuất sắc, kinh nghiệm lâu năm, chúng tôi đã sản xuất hàng trăm loại sản phẩm bằng đồng với mẫu mã và kích thước đa dạng, phong phú trong đó có các loại đồ thờ cúng, tượng đồng chân dung, tượng đài, tượng phật, tranh đồng, trống đồng, chuông, chiêng và các sản phẩm phong thủy, mỹ nghệ trang trí nội ngoại thất cao cấp, được kiểm soát từ đầu vào nguyên liệu cho đến đầu ra thành phẩm, đảm bảo sản phẩm khi đưa ra thị trường đến tay người dùng phải đạt tiêu chuẩn cả về thẩm mỹ và kỹ thuật...',
            'active' => 1
        ]);
        Setting::query()->create([
            'name' => 'cctb_image',
            'setting_type' => 'image',
            'value' => '/img/project-img.png',
            'active' => 1
        ]);
        Setting::query()->create([
            'name' => 'cctb_image_alt',
            'setting_type' => 'image',
            'value' => 'Nghệ nhân ưu tú Vũ Duy Điệp',
            'active' => 1
        ]);
    }
}
