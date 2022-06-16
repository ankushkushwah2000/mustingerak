<?php

namespace App\Http\Controllers\HubManager;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Hub;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HubController extends Controller
{

    public function index()
    {
        return view("hub_manager.hub", [
            "hub" => Hub::where("user_id", auth()->id())->first(),
            "countries" => Country::all(),
            "states" => State::all(),
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            "country" => ["required"],
            "state" => ["required"],
            "city" => ["required"],
            "postcode" => ["required"],
            "address" => ["required"],
        ]);

        $hub = Hub::where("user_id", auth()->id())->firstOrNew();

        $imagePath = $hub->image ?? "";
        $hub_number = $hub->hub_number ?? strtoupper("HUB-" . Str::random(6));

        if ($request->file("image")) {
            if ($hub->image ?? false) {
                Storage::delete($hub->image);
            }
            $imagePath = $request->file("image")->store("/hub");
        }

        $hub->updateOrCreate([
            "user_id" => auth()->id(),
        ], [
            "hub_number" => $hub_number,
            "image" => $imagePath,
            "country_id" => $request->country,
            "state_id" => $request->state,
            "city" => $request->city,
            "postcode" => $request->postcode,
            "address" => $request->address,
        ]);

        Session::flash("success", "Hub Saved Successfully");

        return back();
    }
}
