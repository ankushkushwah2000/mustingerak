<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderStatusController extends Controller
{
    public function update(Request $request, Order $order)
    {
        $request->validate([
            "status_id" => ["required", "exists:statuses,id"]
        ]);

        $hasStatus = $order->statuses->contains($request->status_id);

        if ($hasStatus) {
            Session::flash('danger', 'Duplicate Order Status Not Allowed');
            return back();
        }

        $order->status_id = $request->status_id;
        $order->save();
        $order->statuses()->attach($request->status_id);

        Session::flash('success', 'Order Status Updated Successfully');
        return back();
    }
}
