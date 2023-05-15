<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("products")->delete();
        for ($i = 1; $i < 2000; $i++) {
            $products = [
                "name" => fake()->company,
                "category_id" => rand(2, 11),
                "code" => fake()->postcode,
                "size" => "1,2 m",
                "material" => "Đồng mạ vàng",
                "status" => 0,
                "thumbnail_1" => "uploads/download.jpg",
                "thumbnail_2" => "uploads/download-1.jpg",
                "thumbnail_3" => NULL,
                "thumbnail_4" => NULL,
                "thumbnail_5" => NULL,
                "view" => rand(0, 1000),
                'description' => 'Sản phẩm của Đồ đồng Điệp Oanh thể hiện chất lượng và giá trị, đảm bảo giao tói khách hàng sản phẩm đáng với giá tiền'
            ];
            Product::query()->create($products);
        }
    }
}
