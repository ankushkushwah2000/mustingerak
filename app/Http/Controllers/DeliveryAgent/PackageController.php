<?php

namespace App\Http\Controllers\DeliveryAgent;

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
        return view("delivery_agent.packages.list", [
            "packages" => Package::where("delivery_agent_id", auth()->id())->get()
        ]);
    }

    public function show(Package $package)
    {
        // dd($package->order);
        return view("delivery_agent.packages.show", [
            "package" => $package,
            "order" => $package->order
        ]);
    }

    public function edit(Package $package)
    {
        return view("delivery_agent.packages.edit", [
            "package" => $package,
        ]);
    }

    public function update(Request $request, Package $package)
    {
        if ($request->is_delivered) {
            $request->validate([
                "otp" => ["required", "min:4"]
            ]);
            if ($request->otp === $package->order->otp) {
                $updatePackage["is_delivered"] = $request->is_delivered ? 1 : 0;
            } else {
                Session::flash('danger', 'Invalid OTP!!');
                return back();
            }
        }

        $updatePackage["is_picked_up"] = $request->is_picked_up ? 1 : 0;

        $package->update($updatePackage);

        Session::flash('success', 'Package Updated Successfully');
        return back();
    }
}
