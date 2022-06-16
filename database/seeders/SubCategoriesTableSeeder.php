<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        SubCategory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Factory::create();

        DB::table("sub_categories")->insert([
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                "category_id" => 1,
                'title' => "Mobile",
                'slug' => "mobile",
                'description' => $faker->paragraph(),
                'status' => 1,
                'image' => "no_image"
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                "category_id" => 2,
                'title' => "Mens",
                'slug' => "mens",
                'description' => $faker->paragraph(),
                'status' => 1,
                'image' => "no_image"
            ],
        ]);
    }
}
