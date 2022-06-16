<?php

namespace Database\Seeders;

use App\Models\FrontendSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontendSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        FrontendSetting::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table("frontend_settings")->insert([
            "uuid" => (string) \Illuminate\Support\Str::uuid(),
            "logo" => null,
            "favicon" => null,
            "title" => "Multi vendor ecom",
            "meta_description" => "an advance multi vendor ecom ",
            "meta_keywords" => "advance, multi, vendor, ecom, laravel ",
            "email" => "multivendorecom@example.com",
            "phone" => "1234567890",
            "footer_copyright" => "Copyright @ 2021. All, Right Reserved.",
            "gst_number" => null,
            "licence" => null,
            "app_store" => null,
            "show_app_store" => 0,
            "play_store" => null,
            "show_play_store" => 0,
            "facebook" => "https://www.facebook.com/#",
            "instagram" => "https://www.instagram.com/#",
            "twitter" => "https://www.twitter.com/#",
            "youtube" => "https://www.youtube.com/#",
        ]);
    }
}
