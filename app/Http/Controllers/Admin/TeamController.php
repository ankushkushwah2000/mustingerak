<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function index()
    {

        return view("admin.teams.list", [
            "teams" => Team::all()
        ]);
    }

    public function create()
    {
        return view("admin.teams.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            "image" => ["required"],
            "name" => ["required"],
            "role" => ["required"],
        ]);

        $filePath = $request->file("image")->store("/teams");

        Team::create([
            "image" => $filePath,
            "name" => $request->name,
            "role" => $request->role,
            "facebook" => $request->facebook,
            "instagram" => $request->instagram,
            "twitter" => $request->twitter,
            "google_plus" => $request->google_plus,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash('success', 'New team has been created');
        return back();
    }


    public function show(Team $team)
    {
        //
    }


    public function edit(Team $team)
    {
        return view("admin.teams.edit", [
            "team" => $team
        ]);
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            "name" => ["required"],
            "role" => ["required"],
        ]);

        $imagePath = $team->image;

        if ($request->file("image")) {
            Storage::delete($team->image);
            $imagePath = $request->file("image")->store("/teams");
        }

        $team->update([
            "image" => $imagePath,
            "name" => $request->name,
            "role" => $request->role,
            "facebook" => $request->facebook,
            "instagram" => $request->instagram,
            "twitter" => $request->twitter,
            "google_plus" => $request->google_plus,
            "status" => $request->status ? 1 : 0,
        ]);

        Session::flash('success', 'Team has been updated');
        return back();
    }

    public function destroy(Team $team)
    {
        Storage::delete($team->image);
        $team->delete();
        Session::flash('success', 'Team has been Deleted');
        return back();
    }
}
