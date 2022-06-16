<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CouponController extends Controller
{
    public function index()
    {
        return view("admin.coupons.list", [
            "coupons" => Coupon::all()
        ]);
    }


    public function create()
    {
        return view("admin.coupons.create", [
            "categories" => Category::where("status", 1)->get(),
            "brands" => Brand::where("status", 1)->get(),
            "products" => Product::where("status", 1)->get()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"],
            "code" => ["required"],
            "value" => ["required", "numeric"],
            "type" => ["required"],
            "maximum_discount" => ["required", "numeric"],
            "maximum_uses" => ["required", "numeric"],
            "recurring" => ["numeric"],
            "started_at" => ["required"],
            "expired_at" => ["required"],
        ]);

        Coupon::create([
            "brand_id" => $request->brand_id,
            "product_id" => $request->product_id,
            "category_id" => $request->category_id,

            "title" => $request->title,
            "code" => $request->code,
            "value" => $request->value,
            "type" => $request->type,
            "maximum_discount" => $request->maximum_discount,
            "maximum_uses" => $request->maximum_uses,
            "recurring" => $request->recurring,
            "apply_once" => $request->apply_once  ? 1 : 0,
            "status" => $request->status  ? 1 : 0,
            "started_at" => $request->started_at,
            "expired_at" => $request->expired_at,
        ]);

        Session::flash('success', 'New coupon has been created');
        return back();
    }


    public function show(Coupon $coupon)
    {
        //
    }


    public function edit(Coupon $coupon)
    {
        return view("admin.coupons.edit", [
            "coupon" => $coupon,
            "categories" => Category::where("status", 1)->get(),
            "brands" => Brand::where("status", 1)->get(),
            "products" => Product::where("status", 1)->get()
        ]);
    }

    public function update(Request $request, Coupon $coupon)
    {
        // dd($request->all());
        $request->validate([
            "title" => ["required"],
            "code" => ["required"],
            "value" => ["required", "numeric"],
            "type" => ["required"],
            "maximum_discount" => ["required", "numeric"],
            "maximum_uses" => ["required", "numeric"],
            "recurring" => ["numeric"],
            "started_at" => ["required"],
            "expired_at" => ["required"],
        ]);

        $coupon->update([
            "brand_id" => $request->brand_id,
            "product_id" => $request->product_id,
            "category_id" => $request->category_id,

            "title" => $request->title,
            "code" => $request->code,
            "value" => $request->value,
            "type" => $request->type,
            "maximum_discount" => $request->maximum_discount,
            "maximum_uses" => $request->maximum_uses,
            "recurring" => $request->recurring,
            "apply_once" => $request->apply_once  ? 1 : 0,
            "status" => $request->status  ? 1 : 0,
            "started_at" => $request->started_at,
            "expired_at" => $request->expired_at,
        ]);

        Session::flash('success', 'Coupon has been updated');
        return back();
    }

    public function destroy(Coupon $coupon)
    {

        $coupon->delete();
        Session::flash('success', 'Coupon has been Deleted');
        return back();
    }
}
