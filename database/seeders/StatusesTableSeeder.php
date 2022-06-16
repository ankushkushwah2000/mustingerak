<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Status::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //* Seed Roles ["admin", "seller", "agent", "customer"] */
        DB::table('statuses')->insert([
            [
                "id" => 1,
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                "title" => "Pending",
                "description" => "aaee",
                "status" => 1,
                "admin" => 1,
                "seller" => 1,
                "agent" => 1,
                "customer" => 1,
                "hub_manager" => 1,
                "delivery_agent" => 1,
            ],

            [
                "id" => 2,
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                "title" => "Processing",
                "description" => "sss",
                "status" => 1,
                "admin" => 1,
                "seller" => 1,
                "agent" => 1,
                "customer" => 1,
                "hub_manager" => 1,
                "delivery_agent" => 1,
            ],

            [
                "id" => 3,
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                "title" => "Picked Up",
                "description" => null,
                "status" => 1,
                "admin" => 1,
                "seller" => 1,
                "agent" => 1,
                "customer" => 1,
                "hub_manager" => 1,
                "delivery_agent" => 1,
            ],

            [
                "id" => 4,
                "uuid" => (string) \Illuminate\Support\Str::uuid(),
                "title" => "Out for delivery",
                "description" => null,
                "status" => 1,
                "admin" => 1,
                "seller" => 1,
                "agent" => 1,
                "customer" => 1,
                "hub_manager" => 1,
                "delivery_agent" => 1,
            ],

            [
                "id" => 5,
                "uuid" => (string) \Illuminate\Support\Str::uuid(),

                "title" => " Delivered",
                "description" => null,
                "status" => 1,
                "admin" => 1,
                "seller" => 1,
                "agent" => 1,
                "customer" => 1,
                "hub_manager" => 1,
                "delivery_agent" => 1,
            ],

            [
                "id" => 6,
                "uuid" => (string) \Illuminate\Support\Str::uuid(),

                "title" => "Cancel",
                "description" => null,
                "status" => 1,
                "admin" => 1,
                "seller" => 1,
                "agent" => 1,
                "customer" => 1,
                "hub_manager" => 1,
                "delivery_agent" => 1,
            ],

            [
                "id" => 7,
                "uuid" => (string) \Illuminate\Support\Str::uuid(),

                "title" => "Canceled",
                "description" => null,
                "status" => 1,
                "admin" => 1,
                "seller" => 1,
                "agent" => 1,
                "customer" => 1,
                "hub_manager" => 1,
                "delivery_agent" => 1,
            ]
        ]);
    }
}
