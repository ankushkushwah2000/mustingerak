<?php

namespace App\Http\Controllers\FranchiseManager;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use App\Models\FranchiseProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class FranchiseProductController extends Controller
{

    public function index()
    {
        $franchise = Franchise::where("manager_id", auth()->id())->first();

        if (!$franchise) {
            session()->flash('danger', 'Please Setup Franchise');
            return back();
        }

        return view('franchise_manager.products.list', [
            'franchise_products' => FranchiseProduct::where('franchise_id', $franchise->id)->get()
            // 'franchise_products' => FranchiseProduct::all()
        ]);
    }

    public function show(FranchiseProduct $franchises_product)
    {
        //
    }
}
