<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Factory::create();

        /* Seed Users */

        DB::table("users")->insert([
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'name' => $faker->name(),
                'email' => "admin@example.com",
                'phone' => "9999999999",
                'role_id' => 1,
                'status' => 1,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'name' => $faker->name(),
                'email' => "seller@example.com",
                'phone' => "9999999998",
                'role_id' => 2,
                'status' => 1,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'name' => $faker->name(),
                'email' => "seller2@example.com",
                'phone' => "9999999988",
                'role_id' => 2,
                'status' => 1,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'name' => $faker->name(),
                'email' => "agent@example.com",
                'phone' => "9999999997",
                'role_id' => 3,
                'status' => 1,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'name' => $faker->name(),
                'email' => "customer@example.com",
                'phone' => "9999999996",
                'role_id' => 4,
                'status' => 0,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'name' => $faker->name(),
                'email' => "customer2@example.com",
                'phone' => "9999999986",
                'role_id' => 4,
                'status' => 0,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'name' => $faker->name(),
                'email' => "hub@example.com",
                'phone' => "9999999995",
                'role_id' => 5,
                'status' => 1,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                'name' => $faker->name(),
                'email' => "hub2@example.com",
                'phone' => "9999999985",
                'role_id' => 5,
                'status' => 1,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        ]);
    }
}
