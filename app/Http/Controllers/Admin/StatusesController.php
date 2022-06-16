<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StatusesController extends Controller
{
    public function index()
    {

        return view("admin.statuses.list", [
            "statuses" => Status::all()
        ]);
    }

    public function create()
    {
        return view("admin.statuses.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"],
            "description" => ["max:255"],
        ]);


        Status::create([
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status ? 1 : 0,
            "admin" => $request->admin ? 1 : 0,
            "seller" => $request->seller ? 1 : 0,
            "agent" => $request->agent ? 1 : 0,
            "customer" => $request->customer ? 1 : 0,
            "hub_manager" => $request->hub_manager ? 1 : 0,
            "delivery_agent" => $request->delivery_agent ? 1 : 0,
        ]);

        Session::flash('success', 'New status has been created');
        return back();
    }

    public function show(Status $status)
    {
        //
    }

    public function edit(Status $status)
    {
        return view("admin.statuses.edit", [
            "status" => $status
        ]);
    }

    public function update(Request $request, Status $status)
    {
        $request->validate([
            "title" => ["required"],
            "description" => ["max:255"],
        ]);

        $status->update([
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status ? 1 : 0,
            "admin" => $request->admin ? 1 : 0,
            "seller" => $request->seller ? 1 : 0,
            "agent" => $request->agent ? 1 : 0,
            "customer" => $request->customer ? 1 : 0,
            "hub_manager" => $request->hub_manager ? 1 : 0,
            "delivery_agent" => $request->delivery_agent ? 1 : 0,
        ]);

        Session::flash('success', 'Status has been updated');
        return back();
    }

    public function destroy(Status $status)
    {
        $status->delete();
        Session::flash('success', 'Status has been Deleted');
        return back();
    }
}
