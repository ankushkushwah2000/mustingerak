<?php

namespace Database\Seeders;

use App\Models\SubSubCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubSubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        SubSubCategory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Factory::create();

        DB::table("sub_sub_categories")->insert([
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'sub_category_id' => 1,
                'title' => "Nokia",
                'slug' => "nokia",
                'description' => $faker->paragraph(),
                'status' => 1,
                'image' => "no_image",
                "referral_fee" => 1,
                "closing_fee" => 1,
                "pv" => 1,
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'sub_category_id' => 1,
                'title' => "Lenovo",
                'slug' => "lenovo",
                'description' => $faker->paragraph(),
                'status' => 1,
                'image' => "no_image",
                "referral_fee" => 1,
                "closing_fee" => 1,
                "pv" => 1,
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'sub_category_id' => 2,
                'title' => "T-Shirt",
                'slug' => "t-shirt",
                'description' => $faker->paragraph(),
                'status' => 1,
                'image' => "no_image",
                "referral_fee" => 1,
                "closing_fee" => 1,
                "pv" => 1,
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'sub_category_id' => 2,
                'title' => "Jeans",
                'slug' => "jeans",
                'description' => $faker->paragraph(),
                'status' => 1,
                'image' => "no_image",
                "referral_fee" => 1,
                "closing_fee" => 1,
                "pv" => 1,
            ],
        ]);
    }
}
