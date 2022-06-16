<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FranchiseOrder;
use Illuminate\Http\Request;

class FranchiseOrderController extends Controller
{
    public function index()
    {
        $data['orders'] = FranchiseOrder::with('franchise:id,name')->get();
        return view('admin.franchise_orders.list', $data);
    }

    public function show(FranchiseOrder $franchiseOrder)
    {
        $franchiseOrder->load('franchise');
        $data['order'] = $franchiseOrder;
        $data['products'] = $franchiseOrder->products;
        return view('admin.franchise_orders.show', $data);
    }
}
