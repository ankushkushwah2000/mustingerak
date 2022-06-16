<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Factory::create();
        //
        DB::table("categories")->insert([
            [
                "uuid" => (string) Str::uuid(),
                'title' => "Electronics",
                'slug' => "electronics",
                'description' => $faker->paragraph(),
                'status' => 1,
                'image' => "no_image"
            ],
            [
                "uuid" => (string) Str::uuid(),
                'title' => "Fashion",
                'slug' => "fashion",
                'description' => $faker->paragraph(),
                'status' => 1,
                'image' => "no_image"
            ],
        ]);
    }
}
