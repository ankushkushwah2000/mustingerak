<?php

namespace Database\Seeders;

use App\Models\RazorpayConfig;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RazorpayConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        RazorpayConfig::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table("razorpay_configs")->insert([
            "key" => "rzp_test_cO43UnnLKgQndx",
            "secret" => "zAcsdMRW6QqBrLTZ0OvcV3C8",
            "status" => 1
        ]);
    }
}
