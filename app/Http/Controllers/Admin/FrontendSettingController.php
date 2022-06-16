<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrontendSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FrontendSettingController extends Controller
{
    public function index()
    {
        return view("admin.settings.frontend", [
            "setting" => FrontendSetting::first()
        ]);
    }

    public function update(Request $request, FrontendSetting $frontendSetting)
    {
        $request->validate([
            "phone" => ["numeric"]
        ]);

        $logoPath = $frontendSetting->logo;
        $faviconPath = $frontendSetting->favicon;

        if ($request->file("logo")) {
            Storage::delete($logoPath);
            $logoPath = $request->file("logo")->store("/settings/frontend");
        }
        if ($request->file("favicon")) {
            Storage::delete($faviconPath);
            $faviconPath = $request->file("favicon")->store("/settings/frontend");
        }

        $frontendSetting->update(
            [
                "logo" => $logoPath,
                "favicon" =>  $faviconPath,
                "title" => $request->title,
                "meta_description" => $request->meta_description,
                "meta_keywords" => $request->meta_keywords,
                "email" => $request->email,
                "phone" => $request->phone,
                "alt_phone" => $request->alt_phone,
                "address_line" => $request->address_line,
                "footer_copyright" => $request->footer_copyright,
                "gst_number" => $request->gst_number,
                "licence" => $request->licence,
                "facebook" => $request->facebook,
                "instagram" => $request->instagram,
                "twitter" => $request->twitter,
                "youtube" => $request->youtube,
            ]
        );

        Session::flash('success', 'Setting has been updated');
        return back();
    }
}
