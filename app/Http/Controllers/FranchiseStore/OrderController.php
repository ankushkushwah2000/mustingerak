<?php

namespace App\Http\Controllers\FranchiseStore;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use App\Models\FranchiseOrder;
use App\Models\FranchiseOrderProduct;
use App\Models\FranchiseProduct;

class OrderController extends Controller
{
    public function index()
    {
        $franchise = auth()->user()->franchise();
        if (!$franchise) {
            session()->flash('danger', 'Please Setup Franchise');
            return back();
        }
        $data['orders'] = FranchiseOrder::where('franchise_id', $franchise->id)->get();

        return view('franchise_store.orders.list', $data);
    }

    public function show(FranchiseOrder $franchiseOrder)
    {
        $franchiseOrder->load('franchise');
        $data['order'] = $franchiseOrder;
        $data['products'] = $franchiseOrder->products;
        return view('franchise_store.orders.show', $data);
    }
}
