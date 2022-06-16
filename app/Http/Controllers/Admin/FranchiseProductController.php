<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use App\Models\FranchiseProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class FranchiseProductController extends Controller
{

    public function index()
    {
        return view('admin.franchises_products.list', [
            'franchise_products' => FranchiseProduct::all()
        ]);
    }


    public function create()
    {
        return view('admin.franchises_products.create', [
            'products' => Product::all(),
            'franchises' => Franchise::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'franchise' => ['required'],
            'product' => ['required',],
            'quantity' => ['required', 'numeric'],
            // 'discount' => ['numeric'],
        ]);

        if (FranchiseProduct::where('franchise_id', $request->franchise)->where('product_id', $request->product)->first()) {
            session()->flash('danger', "Product already added to frenchise");
            return back();
        }

        FranchiseProduct::create([
            'franchise_id' => $request->franchise,
            'product_id' => $request->product,
            'quantity' => $request->quantity,
            'discount' => $request->discount ?? 0,
        ]);

        session()->flash('success', "Product added");
        return back();
    }


    public function show(FranchiseProduct $franchises_product)
    {
        //
    }

    public function edit(FranchiseProduct $franchises_product)
    {
        return view('admin.franchises_products.edit', [
            'franchises_product' => $franchises_product,
            'products' => Product::all(),
            'franchises' => Franchise::all()
        ]);
    }


    public function update(Request $request, FranchiseProduct $franchises_product)
    {
        $request->validate([
            // 'franchise' => ['required'],
            // 'product' => ['required',],
            'quantity' => ['required', 'numeric'],
            // 'discount' => ['numeric'],
        ]);

        $franchises_product->update([
            // 'franchise_id' => $request->franchise,
            // 'product_id' => $request->product,
            'quantity' => $request->quantity,
            'discount' => $request->discount ?? 0,
        ]);

        session()->flash('success', "Product Updated");
        return back();
    }

    public function destroy(FranchiseProduct $franchises_product)
    {
        $franchises_product->delete();
        session()->flash('success', "Product Removed");
        return back();
    }
}
