<?php

namespace App\Http\Controllers\Admin;

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
        return view("admin.franchises.list", [
            "franchises" => Franchise::with("country", "state")->get()
        ]);
    }

    public function show(Franchise $franchise)
    {
        return view("admin.franchises.show", [
            "franchise" => $franchise,
            "franchise_products" => $franchise->products,
            "orders" => []

        ]);
    }

    public function edit(Franchise $franchise)
    {
        return view("admin.franchises.edit", [
            "franchise" => $franchise,
            "countries" => Country::all(),
            "states" => State::all(),
        ]);
    }

    public function update(Request $request, Franchise $franchise)
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

        $imagePath = $franchise->image ?? "";
        $franchise_number = $franchise->franchise_number ?? strtoupper("FRN-" . Str::random(6));

        if ($request->file("image")) {
            if ($franchise->image ?? false) {
                Storage::delete($franchise->image);
            }
            $imagePath = $request->file("image")->store("/franchise");
        }

        $franchise->update([
            "image" => $imagePath,
            "country_id" => $request->country,
            "state_id" => $request->state,
            "city" => $request->city,
            "postcode" => $request->postcode,
            "address" => $request->address,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash("success", "Franchise Updated Successfully");
        return back();
    }

    public function destroy(Franchise $franchise)
    {
        $res = Storage::delete($franchise->image);
        $franchise->delete();
        Session::flash('success', 'Franchise has been Deleted');
        return back();
    }
}
