<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {

        return view("admin.banners.list", [
            "banners" => Banner::all(),
            "categories" => Category::all()
        ]);
    }

    public function create()
    {
        return view("admin.banners.create", [
            "categories" => Category::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            "image" => ["required"],
            "title" => ["required"],
            "category_id" => ["required"],
        ]);

        $filePath = $request->file("image")->store("/banners");

        Banner::create([
            "image" => $filePath,
            "title" => $request->title,
            "sub_title" => $request->sub_title,
            "price" => $request->price,
            "selling_price" => $request->selling_price,
            "category_id" => $request->category_id,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash('success', 'New banner has been created');
        return back();
    }


    public function show(Banner $banner)
    {
        //
    }


    public function edit(Banner $banner)
    {
        return view("admin.banners.edit", [
            "banner" => $banner,
            "categories" => Category::all(),
        ]);
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            "title" => ["required"],
            "category_id" => ["required"],
        ]);

        $imagePath = $banner->image;

        if ($request->file("image")) {
            Storage::delete($banner->image);
            $imagePath = $request->file("image")->store("/banners");
        }

        $banner->update([
            "image" => $imagePath,
            "title" => $request->title,
            "sub_title" => $request->sub_title,
            "price" => $request->price,
            "selling_price" => $request->selling_price,
            "category_id" => $request->category_id,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash('success', 'Banner has been updated');
        return back();
    }

    public function destroy(Banner $banner)
    {
        Storage::delete($banner->image);
        $banner->delete();
        Session::flash('success', 'Banner has been Deleted');
        return back();
    }
}
