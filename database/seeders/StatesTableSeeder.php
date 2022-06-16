<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        State::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        /* Seed States */
        DB::table("states")->insert([
            [
                "country_id" => 1,
                "name" => strtolower("JAMMU AND KASHMIR"),
                "code" => 1,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("HIMACHAL PRADESH"),
                "code" => 2,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("PUNJAB"),
                "code" => 3,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("CHANDIGARH"),
                "code" => 4,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("UTTARAKHAND"),
                "code" => 5,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("HARYANA"),
                "code" => 6,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("DELHI"),
                "code" => 7,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("RAJASTHAN"),
                "code" => 8,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("UTTAR PRADESH"),
                "code" => 9,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("BIHAR"),
                "code" => 10,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("SIKKIM"),
                "code" => 11,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("ARUNACHAL PRADESH"),
                "code" => 12,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("NAGALAND"),
                "code" => 13,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("MANIPUR"),
                "code" => 14,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("MIZORAM"),
                "code" => 15,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("TRIPURA"),
                "code" => 16,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("MEGHALAYA"),
                "code" => 17,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("ASSAM"),
                "code" => 18,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("WEST BENGAL"),
                "code" => 19,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("JHARKHAND"),
                "code" => 20,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("ODISHA"),
                "code" => 21,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("CHATTISGARH"),
                "code" => 22,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("MADHYA PRADESH"),
                "code" => 23,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("GUJARAT"),
                "code" => 24,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("DADRA AND NAGAR HAVELI AND DAMAN AND DIU"),
                "code" => 26,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("MAHARASHTRA"),
                "code" => 27,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("ANDHRA PRADESH"),
                "code" => 28,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("KARNATAKA"),
                "code" => 29,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("GOA"),
                "code" => 30,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("LAKSHADWEEP"),
                "code" => 31,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("KERALA"),
                "code" => 32,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("TAMIL NADU"),
                "code" => 33,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("PUDUCHERRY"),
                "code" => 34,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("ANDAMAN AND NICOBAR ISLANDS"),
                "code" => 35,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("TELANGANA"),
                "code" => 36,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("ANDHRA PRADESH"),
                "code" => 37,
            ],
            [
                "country_id" => 1,
                "name" => strtolower("LADAKH"),
                "code" => 38,
            ],
        ]);
    }
}
