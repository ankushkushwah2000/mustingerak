<?php

namespace App\Http\Controllers\HubManager;

use App\Http\Controllers\Controller;
use App\Models\Hub;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PackageController extends Controller
{
    public function index()
    {
        $hub = Hub::where("user_id", auth()->id())->first();
        return view("hub_manager.packages.list", [
            "packages" => Package::with("delivery_agent", "order")->where("hub_id", $hub->id)->get()
        ]);
    }

    public function show(Package $package)
    {
        // dd($package->order);
        return view("hub_manager.packages.show", [
            "package" => $package,
            "order" => $package->order
        ]);
    }

    public function create()
    {
        $hub = Hub::where("user_id", auth()->id())->first();
        return view("hub_manager.packages.create", [
            "orders" => $hub->orders,
            "delivery_agents" => $hub->delivery_agents()
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            "order" => ["required", Rule::unique("packages", "order_id")->whereNull('deleted_at')],
            "delivery_agent" => ["required"]
        ]);

        $order = Order::with("products.seller")->find($request->order);

        $hub = Hub::where("user_id", auth()->id())->first();
        $delivery_agent = User::find($request->delivery_agent);
        $product = $order->products[0];
        $seller = $product->seller;
        $sellerProfile = $seller->sellerProfile;

        if (!$sellerProfile) /* If seller profile is incomplete */ {
            Session::flash('danger', 'Seller profile is incomplete');
            return back();
        }

        $newPackage = [
            "hub_id" => $hub->id,
            "order_id" => $order->id,
            "delivery_agent_id" => $delivery_agent->id,
            "package_number" => strtoupper("PKG-" . Str::random(7)),
            "payment_status" => $order->payment_status,

            "pickup_address" => $seller->name . " | " . $sellerProfile->address . " | " . $sellerProfile->postcode . " | " . $sellerProfile->country->name . " | " . $sellerProfile->state->name . " | " . $sellerProfile->city . " | " . $seller->phone . " | " . $sellerProfile->alt_phone . " | " . $seller->email,

            "shipping_address" => $order->s_first_name . " " . $order->s_last_name . " | " . $order->s_address_line . " | " . $order->s_address_line_2 . " | " . $order->s_country->name . " | " . $order->s_state->name . " | " . $order->s_city . " | " . $order->s_postcode . " | " . $order->s_email . " | " . $order->s_phone,

            "is_picked_up" => false,
            "is_delivered" => false,

            "is_fragile" => $request->is_fragile ? 1 : 0,
        ];


        Package::create($newPackage);

        Session::flash('success', 'Package Created Successfully');
        return back();
    }

    public function edit(Package $package)
    {
        $hub = Hub::where("user_id", auth()->id())->first();
        return view("hub_manager.packages.edit", [
            "package" => $package,
            "delivery_agents" => $hub->delivery_agents()
        ]);
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            "delivery_agent" => ["required"],
            "payment_status" => ["required"],
            "pickup_address" => ["required"],
            "shipping_address" => ["required"],
        ]);
        $delivery_agent = User::find($request->delivery_agent);
        $updatePackage = [
            "delivery_agent_id" => $delivery_agent->id,
            "payment_status" => $request->payment_status,
            "pickup_address" => $request->pickup_address,
            "shipping_address" => $request->shipping_address,
            "is_picked_up" => $request->is_picked_up ? 1 : 0,
            "is_delivered" => $request->is_delivered ? 1 : 0,
            "is_fragile" => $request->is_fragile ? 1 : 0,
        ];

        $package->update($updatePackage);

        Session::flash('success', 'Package Updated Successfully');
        return back();
    }


    public function destroy(Package $package)
    {
        $package->delete();
        Session::flash('success', 'Package Deleted Successfully');
        return back();
    }
}
