<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        File::cleanDirectory("storage/app/public");

        $this->call([
            RolesTableSeeder::class,
            CountariesTableSeeder::class,
            StatesTableSeeder::class,
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            SubCategoriesTableSeeder::class,
            SubSubCategoriesTableSeeder::class,
            RazorpayConfigsTableSeeder::class,
            BrandsTableSeeder::class,
            ProductsTableSeeder::class,
            FrontendSettingsTableSeeder::class,
            StatusesTableSeeder::class,
        ]);
    }
}
