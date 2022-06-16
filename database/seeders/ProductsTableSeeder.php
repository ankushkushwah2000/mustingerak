<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        //

        $faker = Factory::create();
        //
        DB::table("products")->insert([
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'seller_id' => 2,
                'title' => "Nokia 3310",
                'slug' => "nokia-3310",
                'summary' => $faker->paragraph(),
                'description' => $faker->paragraphs(4, true),
                'key_features' => $faker->paragraphs(3, true),
                'features' => $faker->paragraphs(4, true),
                'legal_disclaimer' => $faker->sentence(8, true),
                'mrp' => 2000,
                'price' => 1999,
                'selling_price' => 1899,
                'gst' => 18,
                'manufacture' => "NOKIA",
                'country' => "Finland",
                'box_content' => $faker->paragraphs(3, true),
                'warranty' => 36,
                'quantity' => 1000,
                'brand_id' => 1,
                'model' => "3310",
                'pin_code' => 1122255,
                'hsn' => "HSN564686JFHHDSS",
                'sku' => "SKU58899HWEGJJJX",
                'image' => "no_image",
                'in_stock' => 1,
                'cod_enable' => 1,
                'status' => 1,
                'category_id' => 1,
                'sub_category_id' => 1,
                'sub_sub_category_id' => 1,
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'seller_id' => 3,
                'title' => "Lenovo Z2",
                'slug' => "lenovo-z2",
                'summary' => $faker->paragraph(),
                'description' => $faker->paragraphs(4, true),
                'key_features' => $faker->paragraphs(3, true),
                'features' => $faker->paragraphs(4, true),
                'legal_disclaimer' => $faker->sentence(8, true),
                'mrp' => 1800,
                'price' => 1699,
                'selling_price' => 1599,
                'gst' => 18,
                'manufacture' => "Lenovo",
                'country' => "China",
                'box_content' => $faker->paragraphs(3, true),
                'warranty' => 36,
                'quantity' => 1000,
                'brand_id' => 2,
                'model' => "Z2",
                'pin_code' => 8899554,
                'hsn' => "HSNUGGSJSI452563",
                'sku' => "SKUYYEEJJS778556",
                'image' => "no_image",
                'in_stock' => 1,
                'cod_enable' => 1,
                'status' => 1,
                'category_id' => 1,
                'sub_category_id' => 1,
                'sub_sub_category_id' => 2,
            ],
        ]);
    }
}
