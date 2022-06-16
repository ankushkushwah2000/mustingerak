<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{

    public function index()
    {
        return view("admin.reviews.list", [
            "reviews" => Review::with("user:id,name,email", "product:id,title")->get()
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Review $review)
    {
        return view("admin.reviews.show", [
            "review" => $review
        ]);
    }

    public function edit(Request $request, Review $review)
    {
        return view("admin.reviews.edit", [
            "review" => $review
        ]);
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            "name" => ["required"],
            "email" => ["required", "email"],
            "message" => ["required"],
            "rating" => ["required", "numeric", "between:1,5"]
        ]);

        $review->update([
            "rating" => $request->rating,
            "message" => $request->message,
        ]);

        session()->flash("success", "Review Updated Successfully");
        return back();
    }

    public function destroy(Review $review)
    {
        $review->delete();
        Session::flash("success", "Review Deleted Successfully");
        return back();
    }
}
