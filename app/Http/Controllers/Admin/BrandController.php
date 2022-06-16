<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        return view("admin.brands.list", [
            "brands" => Brand::all()
        ]);
    }


    public function create()
    {
        return view("admin.brands.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"],
            "description" => ["required"],
            "image" => ["required"],

        ]);

        $filePath = $request->file("image")->store("/brands");

        Brand::create([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "description" => $request->description,
            "image" => $filePath,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash('success', 'New brand has been created');
        return back();
    }


    public function show(Brand $brand)
    {
        //
    }


    public function edit(Brand $brand)
    {
        return view("admin.brands.edit", [
            "brand" => $brand
        ]);
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            "title" => ["required"],
            "description" => ["required"],
        ]);

        if ($request->file("image")) {

            Storage::delete($brand->image);
            $filePath = $request->file("image")->store("/brands");

            $brand->update([
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "description" => $request->description,
                "image" => $filePath,
                "status" => $request->status ? 1 : 0,
            ]);
        } else {
            $brand->update([
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "description" => $request->description,
                "status" => $request->status ? 1 : 0,
            ]);
        }

        Session::flash('success', 'Brand has been updated');
        return back();
    }

    public function destroy(Brand $brand)
    {
        Storage::delete($brand->image);
        $brand->delete();
        Session::flash('success', 'Brand has been Deleted');
        return back();
    }
}
