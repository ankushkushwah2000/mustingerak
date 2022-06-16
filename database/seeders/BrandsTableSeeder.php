<?php

namespace Database\Seeders;

use App\Models\Brand;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Brand::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        //

        $faker = Factory::create();
        //
        DB::table("brands")->insert([
            [

                "uuid" => (string) Str::uuid(),
                'title' => "Nokia",
                'slug' => "nokia",
                'description' => $faker->paragraph(),
                'status' => 1,
                'image' => "no_image"
            ],
            [

                "uuid" => (string) Str::uuid(),
                'title' => "Lenovo",
                'slug' => "lenovo",
                'description' => $faker->paragraph(),
                'status' => 1,
                'image' => "no_image"
            ],
        ]);
    }
}
