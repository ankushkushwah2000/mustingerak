<?php

namespace App\Http\Controllers\HubManager;

use App\Http\Controllers\Controller;
use App\Models\Hub;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Hub::where("user_id", auth()->id())->firstOrFail()->orders;
        $orders->load("status");

        return view("hub_manager.orders.list", [
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
        $order->load("products:id,title,image,selling_price,created_at", "statuses");

        /* Set Status to 1 (Pending) if status not exists */
        // if ($order->statuses->count()  === 0) {
        //     $order->statuses()->attach([1]);
        // }

        return view("hub_manager.orders.show", [
            "order" => $order,
            "orderStatuses" => $order->statuses,
            "currentStatus" => $order->statuses[0] ?? (object) array(
                "id" => 0,
                'title' => 'no status',
            ),
            "statuses" => Status::where("status", 1)->get(),
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
        // $order->delete();
        // Session::flash('success', 'Order has been Deleted');
        Session::flash('danger', 'Not allowed!!');
        return back();
    }
}
