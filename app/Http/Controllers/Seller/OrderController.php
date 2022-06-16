<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Hub;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $seller = auth()->user();
        return view("seller.orders.list", [
            "orders" => Order::with("status")->whereHas("products", function ($q) use ($seller) {
                $q->where("seller_id", $seller->id);
            })->get()
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

        $order->load("products:id,title,image,selling_price,created_at");
        return view("seller.orders.show", [
            "order" => $order,
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
