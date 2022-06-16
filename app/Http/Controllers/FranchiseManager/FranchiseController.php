<?php

namespace App\Http\Controllers\FranchiseManager;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Franchise;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FranchiseController extends Controller
{

    public function index()
    {
        return view("franchise_manager.franchise", [
            "franchise" => Franchise::where("manager_id", auth()->id())->first(),
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
            "email" => ["required"],
            "phone" => ["required"],
            "name" => ["required"],
        ]);

        $franchise = Franchise::where("manager_id", auth()->id())->firstOrNew();

        $imagePath = $franchise->image ?? "";
        $franchise_number = $franchise->franchise_number ?? strtoupper("FRN-" . Str::random(6));

        if ($request->file("image")) {
            if ($franchise->image ?? false) {
                Storage::delete($franchise->image);
            }
            $imagePath = $request->file("image")->store("/franchise");
        }

        $franchise->updateOrCreate([
            "manager_id" => auth()->id(),
        ], [
            "franchise_number" => $franchise_number,
            "image" => $imagePath,
            "country_id" => $request->country,
            "state_id" => $request->state,
            "city" => $request->city,
            "postcode" => $request->postcode,
            "address" => $request->address,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
        ]);

        Session::flash("success", "Franchise Saved Successfully");

        return back();
    }
}
