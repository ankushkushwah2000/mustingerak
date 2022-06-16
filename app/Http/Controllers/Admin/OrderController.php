<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hub;
use App\Models\Order;
use App\Models\RazorpayPayment;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('status')->get();
        // $orders = Order::with('statuses', function ($q) {
        //     $q->first();
        // })->get();
        // dd($orders);
        return view("admin.orders.list", [
            "orders" => $orders
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Order $order)
    {

        $order->load("products:id,title,image,selling_price,created_at", 'status', "statuses");

        /* Set Status to 1 (Pending) if status not exists */
        // if ($order->statuses->count()  === 0) {
        //     $order->statuses()->attach([1]);
        // }

        return view("admin.orders.show", [
            "order" => $order,
            "orderStatuses" => $order->statuses,
            "currentStatus" => $order->status ?? (object) array(
                "id" => 0,
                'title' => 'no status',
            ),
            "statuses" => Status::where("status", 1)->get(),
            "hubs" => Hub::with("state")->where("status", 1)->get(),
            "razorpay_payment" => RazorpayPayment::where("bulk_order_number", $order->bulk_order_number)->first() ?? ""
        ]);
    }


    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        //
    }


    public function destroy(Order $order)
    {
        $order->delete();
        Session::flash('success', 'Order has been Deleted');
        return back();
    }
}
