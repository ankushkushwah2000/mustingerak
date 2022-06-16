<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ReturnRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReturnRequestController extends Controller
{
    public function index()
    {

        return view("admin.return_requests.list", [
            "return_requests" => ReturnRequest::all()
        ]);
    }

    public function create()
    {
        return view("admin.return_requests.create", [
            "users" => User::all(),
            "orders" => Order::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            "status" => ["required"],
            "message" => ["required"],
            "request_number" => ["required"],
            "user" => ["required"],
            "order" => ["required"],
        ]);

        $order = Order::findOrFail($request->order);

        // dd($order);

        if (!$order->canReturn()) {
            session()->flash("danger", "Cannot Create Return Request");
            return back();
        }


        ReturnRequest::create([
            "message" => $request->message,
            "request_number" => $request->request_number,
            "status" => $request->status,
            "customer_id" => $request->user,
            "order_id" => $request->order,
        ]);

        session()->flash('success', 'New Return Request has been Created');
        return back();
    }


    public function show(ReturnRequest $returnRequest)
    {
        //
    }


    public function edit(ReturnRequest $returnRequest)
    {
        return view("admin.return_requests.edit", [
            "returnRequest" => $returnRequest
        ]);
    }

    public function update(Request $request, ReturnRequest $returnRequest)
    {
        $request->validate([
            // "status" => ["required"],
            // "message" => ["required"],
            "request_number" => ["required"],
        ]);

        // dd($request->status);

        $returnRequest->update([
            // "message" => $request->message,
            // "request_number" => $request->request_number,
            "status" => $request->status,
        ]);

        session()->flash('success', 'Return Request has been updated');
        return back();
    }

    public function destroy(ReturnRequest $returnRequest)
    {
        $returnRequest->delete();
        session()->flash('success', 'Return Request has been Deleted');
        return back();
    }
}
