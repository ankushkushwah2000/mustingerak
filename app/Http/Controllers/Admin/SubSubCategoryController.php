<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubSubCategoryController extends Controller
{
    public function index()
    {
        return view("admin.sub_sub_categories.list", [
            "subsubcategories" => SubSubCategory::all(),
        ]);
    }


    public function create()
    {
        return view("admin.sub_sub_categories.create", [
            "categories" => Category::all(),
            "subcategories" => SubCategory::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"],
            "description" => ["required"],
            "image" => ["required"],
            "closing_fee" => ["required"],
            "referral_fee" => ["required"],
            "pv" => ["required"],
            "sub_category_id" => ["required"],
            "category_id" => ["required"],
        ]);

        $filePath = $request->file("image")->store("/subsubcategores");

        SubSubCategory::create([
            "sub_category_id" => $request->sub_category_id,
            "category_id" => $request->category_id,
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "description" => $request->description,
            "pv" => $request->pv,
            "referral_fee" => $request->referral_fee,
            "closing_fee" => $request->closing_fee,
            "image" => $filePath,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash('success', 'New Sub Sub Category has been created');
        return back();
    }


    public function show(SubSubCategory $subsubcategory)
    {
        //
    }


    public function edit(SubSubCategory $subsubcategory)
    {
        return view("admin.sub_sub_categories.edit", [
            "subsubcategory" => $subsubcategory,
           // "categories" => Category::all(),
            "subcategories" => SubCategory::all()
        ]);
    }

    public function update(Request $request, SubSubCategory $subsubcategory)
    {
        $request->validate([
            "title" => ["required"],
            "description" => ["required"],
            "closing_fee" => ["required"],
            "referral_fee" => ["required"],
            "pv" => ["required"],
            "sub_category_id" => ["required"],
            "category_id" => ["required"],
        ]);

        if ($request->file("image")) {

            Storage::delete($subsubcategory->image);
            $filePath = $request->file("image")->store("/subsubcategores");

            $subsubcategory->update([
                "sub_category_id" => $request->sub_category_id,
                "category_id" => $request->category_id,
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "description" => $request->description,
                "pv" => $request->pv,
                "referral_fee" => $request->referral_fee,
                "closing_fee" => $request->closing_fee,
                "image" => $filePath,
                "status" => $request->status ? 1 : 0,

            ]);
        } else {
            $subsubcategory->update([
                "sub_category_id" => $request->sub_category_id,
                "category_id" => $request->category_id,
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "description" => $request->description,
                "pv" => $request->pv,
                "referral_fee" => $request->referral_fee,
                "closing_fee" => $request->closing_fee,
                "status" => $request->status ? 1 : 0,
            ]);
        }

        Session::flash('success', 'SubSubCategory has been updated');
        return back();
    }

    public function destroy(SubSubCategory $subsubcategory)
    {
        Storage::delete($subsubcategory->image);
        $subsubcategory->delete();
        Session::flash('success', 'SubSubCategory has been Deleted');
        return back();
    }
}
