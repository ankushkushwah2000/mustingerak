<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class SubCategoryController extends Controller
{
    public function index()
    {
        return view("admin.sub_categories.list", [
            "subcategories" => SubCategory::all(),

        ]);
    }


    public function create()
    {
        return view("admin.sub_categories.create", [
            "categories" => Category::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"],
            "description" => ["required"],
            "image" => ["required"],
            "category_id" => ["required"],
        ]);

        $filePath = $request->file("image")->store("/subcategores");

        SubCategory::create([
            "category_id" => $request->category_id,
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "description" => $request->description,
            "image" => $filePath,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash('success', 'New Sub Category has been created');
        return back();
    }


    public function show(SubCategory $subcategory)
    {
        //
    }


    public function edit(SubCategory $subcategory)
    {
        return view("admin.sub_categories.edit", [
            "subcategory" => $subcategory,
            "categories" => Category::all()
        ]);
    }

    public function update(Request $request, SubCategory $subcategory)
    {
        $request->validate([
            "title" => ["required"],
            "description" => ["required"],
            "category_id" => ["required"],
        ]);

        if ($request->file("image")) {

            Storage::delete($subcategory->image);
            $filePath = $request->file("image")->store("/subcategores");

            $subcategory->update([
                "category_id" => $request->category_id,
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "description" => $request->description,
                "image" => $filePath,
                "status" => $request->status ? 1 : 0,

            ]);
        } else {
            $subcategory->update([
                "category_id" => $request->category_id,
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "description" => $request->description,
                "status" => $request->status ? 1 : 0,
            ]);
        }

        Session::flash('success', 'SubCategory has been updated');
        return back();
    }

    public function destroy(SubCategory $subcategory)
    {
        Storage::delete($subcategory->image);
        $subcategory->delete();
        Session::flash('success', 'SubCategory has been Deleted');
        return back();
    }
}
