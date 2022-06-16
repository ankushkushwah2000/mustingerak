<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    public function index()
    {
        return view("admin.categories.list", [
            "categories" => Category::all()
        ]);
    }


    public function create()
    {
        return view("admin.categories.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"],
            "description" => ["required"],
            "image" => ["required"],

        ]);

        $filePath = $request->file("image")->store("/categores");

        Category::create([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "description" => $request->description,
            "image" => $filePath,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash('success', 'New category has been created');
        return back();
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view("admin.categories.edit", [
            "category" => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            "title" => ["required"],
            "description" => ["required"],
        ]);

        if ($request->file("image")) {

            Storage::delete($category->image);
            $filePath = $request->file("image")->store("/categores");

            $category->update([
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "description" => $request->description,
                "image" => $filePath,
                "status" => $request->status ? 1 : 0,
            ]);
        } else {
            $category->update([
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "description" => $request->description,
                "status" => $request->status ? 1 : 0,
            ]);
        }

        Session::flash('success', 'Category has been updated');
        return back();
    }

    public function destroy(Category $category)
    {
        $res = Storage::delete($category->image);
        $category->delete();
        Session::flash('success', 'Category has been Deleted');
        return back();
    }
}
