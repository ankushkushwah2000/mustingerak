<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminProfile;
use App\Models\Country;
use App\Models\SellerProfile;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view("admin.profile", [
            "user" => User::where("id", Auth::id())->first(),
            "countries" => Country::all(),
            "states" => State::all(),
        ]);
    }
    public function save(Request $request)
    {

        // get current auth user
        $user = User::findOrFail(auth()->id());

        // dd($user);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique("users", "email")->ignore($user)],
            "country" => ["required"],
            "state" => ["required"],
            "city" => ["required"],
            "postcode" => ["required"],
            "address" => ["required"],
        ]);

        $password = $user->password;

        if ($request->password) {
            if (Hash::check($request->current_password, $user->password)) {
                $request->validate([
                    'current_password' => [Password::defaults()],
                    'password' => ['confirmed', Password::defaults()],
                ]);
                $password = Hash::make($request->password);
                Session::flash('success', "Password Changed");
            } else {
                Session::flash('danger', "Password Invalid");
            }
        }

        // update user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);

        $profile = AdminProfile::where("user_id", $user->id)->firstOrNew();

        $imagePath = $profile->image ?? "";

        if ($request->file("image")) {
            if ($profile->image ?? false) {
                Storage::delete($profile->image);
            }
            $imagePath = $request->file("image")->store("/profile/seller");
        }

        $profile->updateOrCreate([
            "user_id" => $user->id,
        ], [
            "image" => $imagePath,
            "country_id" => $request->country,
            "state_id" => $request->state,
            "city" => $request->city,
            "gst_number" => $request->gst_number,
            "alt_phone" => $request->alt_phone,
            "postcode" => $request->postcode,
            "address" => $request->address,
        ]);

        Session::flash("success", "Profile Saved Successfully");

        return back();
    }
}
