<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonationPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DonationPostController extends Controller
{
    public function index()
    {

        return view("admin.donation_posts.list", [
            "donation_posts" => DonationPost::all()
        ]);
    }

    public function create()
    {
        return view("admin.donation_posts.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required"],
            "excerpt" => ["required"],
            "amount" => ["required"],
            "link" => ["required", "url"],
            "content" => ["required"],
            "image" => ["required"],
        ]);

        $imagePath = $request->file("image")->store("/donation_posts");

        DonationPost::create([
            "user_id" => auth()->id(),
            "image" => $imagePath,
            "title" => $request->title,
            "excerpt" => $request->excerpt,
            "amount" => $request->amount,
            "link" => $request->link,
            "content" => $request->content,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash('success', 'New donationPost has been created');
        return back();
    }


    public function show(DonationPost $donationPost)
    {
        //
    }


    public function edit(DonationPost $donationPost)
    {
        return view("admin.donation_posts.edit", [
            "donation_post" => $donationPost
        ]);
    }

    public function update(Request $request, DonationPost $donationPost)
    {
        $request->validate([
            "title" => ["required"],
        ]);

        $imagePath = $donationPost->image;

        if ($request->file("image")) {
            Storage::delete($donationPost->image);
            $imagePath = $request->file("image")->store("/donation_posts");
        }

        $donationPost->update([
            "image" => $imagePath,
            "title" => $request->title,
            "excerpt" => $request->excerpt,
            "amount" => $request->amount,
            "link" => $request->link,
            "content" => $request->content,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash('success', 'DonationPost has been updated');
        return back();
    }

    public function destroy(DonationPost $donationPost)
    {
        Storage::delete($donationPost->image);
        $donationPost->delete();
        Session::flash('success', 'DonationPost has been Deleted');
        return back();
    }
}
