<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EnquiryController extends Controller
{

    public function index()
    {
        return view("admin.enquiries.list", [
            "enquiries" => Enquiry::all()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Enquiry $enquiry)
    {
        return view("admin.enquiries.show", [
            "enquiry" => $enquiry
        ]);
    }

    public function edit(Request $request, Enquiry $enquiry)
    {
        $request->validate([
            "name" => ["required"],
            "email" => ["required"],
            "message" => ["required"],
        ]);

        $enquiry->update([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->name,
        ]);

        Session::flash("success", "Enquiry Updated Successfully");
        return back();
    }

    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();
        Session::flash("success", "Enquiry Deleted Successfully");
        return back();
    }
}
