<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RazorpayConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RazorpayConfigController extends Controller
{

    public function index()
    {
        return view("admin.gateways.razorpay", [
            "gateway" => RazorpayConfig::first()
        ]);
    }

    public function update(Request $request, RazorpayConfig $razorpayConfig)
    {
        $request->validate([
            "key" => ["required"],
            "secret" => ["required"],
        ]);

        $razorpayConfig->update([
            'key' => $request->key,
            'secret' => $request->secret,
            'status' => $request->status ? 1 : 0,
        ]);

        Session::flash('info', 'Razorpay config has been updated');
        return back();
    }
}
