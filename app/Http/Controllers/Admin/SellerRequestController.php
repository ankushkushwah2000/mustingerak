<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SellerRequest;
use Illuminate\Http\Request;

class SellerRequestController extends Controller
{
    public function index()
    {

        return view("admin.seller_requests.list", [
            "seller_requests" => SellerRequest::all()
        ]);
    }

    public function create()
    {
        // return view("admin.seller_requests.create");
    }


    public function store(Request $request)
    {
    }


    public function show(SellerRequest $sellerRequest)
    {
        //
    }


    public function edit(SellerRequest $sellerRequest)
    {

        return view("admin.seller_requests.edit", [
            "sellerRequest" => $sellerRequest
        ]);
    }

    public function update(Request $request, SellerRequest $sellerRequest)
    {
        $sellerRequest->update([
            "status" => $request->status,
        ]);

        session()->flash('success', 'Seller Request Request has been updated');
        return back();
    }

    public function destroy(SellerRequest $sellerRequest)
    {
        $sellerRequest->delete();
        session()->flash('success', 'Seller Request Request has been Deleted');
        return back();
    }
}
