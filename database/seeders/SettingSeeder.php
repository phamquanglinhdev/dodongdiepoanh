<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::query()->truncate();
        Setting::query()->create([
            'name' => 'footer_description',
            'value' => '<p>GPĐKKD: 600662679, cấp ngày 08/10/2009</p>
                    <p>Nơi cấp: Sở KH và Đầu Tư tỉnh Nam Định</p>
                    <p>Điện thoại : 0949.806.083</p>
                    <p>Email : dodongdiepoanh@gmail.com</p>
                    <p>Địa chỉ : KCN Trấn Lâm - Ý Yên - Nam Định</p>
                    <p>Xưởng sản xuất: Khu A – Thị Trấn Lâm – Ý Yên – Nam Định</p>',
        ]);
        Setting::query()->create([
            'name' => 'map_code',
            'value' => "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d239466.84759468783!2d106.018833!3d20.313943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313677b2397a258f%3A0x8e2e7cdbc3c3cfc6!2zQ3R5IHRuaGggbeG7mXQgdGjDoG5oIHZpw6puIMSRw7pjIMSRaeG7h3Agb2FuaA!5e0!3m2!1sen!2sus!4v1684377369137!5m2!1sen!2sus"
        ]);
        Setting::query()->create([
            'name' => "facebook_page_message_code",
            'value' => 'https://www.facebook.com/messages/t/110488705004714',
        ]);
        Setting::query()->create([
            'name' => 'zalo_page_message_code',
            'value' => 'https://zalo.me/3236278465751243976',
        ]);
        Setting::query()->create([
            'name' => 'business_phone',
            'value' => '0949 806 083',
        ]);
        Setting::query()->create([
            'name' => 'google_tag_manager',
            'value' => "<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KW5QJ93');</script>
<!-- End Google Tag Manager -->"
        ]);
        Setting::query()->create([
            'name' => 'google_tag_manager_noscript',
            'value' => '<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KW5QJ93"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->'
        ]);
        Setting::query()->create([
            'name' => 'pin_category_ids',
            'value' => "[1,10]"
        ]);
    }
}
