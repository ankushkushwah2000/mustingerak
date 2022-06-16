<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hub;
use App\Models\HubOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HubOrderController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            "hub_id" => ["required"],
            "order_id" => ["required", "unique:hub_orders"],
        ]);

        HubOrder::create([
            "hub_id" => $request->hub_id,
            "order_id" => $request->order_id,
        ]);

        Session::flash('success', 'Order passed to hub');
        return back();
    }
}
