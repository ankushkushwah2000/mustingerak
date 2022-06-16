<?php

namespace App\Http\Controllers\Admin;

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
        return view("admin.hubs.list", [
            "hubs" => Hub::with("state")->get()
        ]);
    }

    public function show(Hub $hub)
    {
        return view("admin.hubs.show", [
            "hub" => $hub,
            "orders" => $hub->orders
        ]);
    }

    public function edit(Hub $hub)
    {
        return view("admin.hubs.edit", [
            "hub" => $hub,
            "countries" => Country::all(),
            "states" => State::all(),
        ]);
    }

    public function update(Request $request, Hub $hub)
    {
        $request->validate([
            "country" => ["required"],
            "state" => ["required"],
            "city" => ["required"],
            "postcode" => ["required"],
            "address" => ["required"],
        ]);

        $imagePath = $hub->image ?? "";
        $hub_number = $hub->hub_number ?? strtoupper("HUB-" . Str::random(6));

        if ($request->file("image")) {
            if ($hub->image ?? false) {
                Storage::delete($hub->image);
            }
            $imagePath = $request->file("image")->store("/hub");
        }

        $hub->update([
            "image" => $imagePath,
            "country_id" => $request->country,
            "state_id" => $request->state,
            "city" => $request->city,
            "postcode" => $request->postcode,
            "address" => $request->address,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash("success", "Hub Updated Successfully");

        return back();
    }

    public function destroy(Hub $hub)
    {
        $res = Storage::delete($hub->image);
        $hub->delete();
        Session::flash('success', 'Hub has been Deleted');
        return back();
    }
}
