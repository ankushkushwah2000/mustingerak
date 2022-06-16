<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //* Seed Roles ["admin", "seller", "agent", "customer"] */
        DB::table('roles')->insert([
            [

                "uuid" => (string) Str::uuid(),
                "title" => "admin",
                "description" => "an user with all the permissions",
            ], [

                "uuid" => (string) Str::uuid(),
                "title" => "seller",
                "description" => "an user with seller related permission only",
            ], [

                "uuid" => (string) Str::uuid(),
                "title" => "agent",
                "description" => "an user with agent related permissions.",
            ], [

                "uuid" => (string) Str::uuid(),
                "title" => "customer",
                "description" => "an normal customer",
            ], [

                "uuid" => (string) Str::uuid(),
                "title" => "hub manager",
                "description" => "an user with hub managing related permissions only",
            ], [

                "uuid" => (string) Str::uuid(),
                "title" => "delivery agent",
                "description" => "an delivery agent with delivery agent related permissions only",
            ], [

                "uuid" => (string) Str::uuid(),
                "title" => "franchise manager",
                "description" => "an franchise manager with franchise manager related permissions only",
            ], [

                "uuid" => (string) Str::uuid(),
                "title" => "franchise staff",
                "description" => "an franchise staff with franchise staff related permissions only",
            ],
        ]);
    }
}
