<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        return view("admin.pages.list", [
            "pages" => Page::all()
        ]);
    }


    public function create()
    {
        return view("admin.pages.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"],
            "content" => ["required"],
        ]);

        Page::create([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "content" => $request->content,
        ]);

        Session::flash('success', 'New page has been created');
        return back();
    }


    public function show(Page $page)
    {
        //
    }


    public function edit(Page $page)
    {
        return view("admin.pages.edit", [
            "page" => $page
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            "title" => ["required"],
            "content" => ["required"],
        ]);

        $page->update([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "content" => $request->content,
        ]);

        Session::flash('success', 'Page has been updated');
        return back();
    }

    public function destroy(Page $page)
    {
        $page->delete();
        Session::flash('success', 'Page has been Deleted');
        return back();
    }
}
