<?php

namespace App\Http\Controllers\FranchiseManager;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\FranchiseStaffProfile;
use App\Models\Franchise;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class FranchiseStaffController extends Controller
{
    public function index()
    {

        $franchise = Franchise::where("manager_id", auth()->id())->first();

        if (!$franchise) {
            Session::flash('danger', 'Please Setup Franchise');
            return back();
        }
        // dd($franchise->franchise_staff);

        $users = User::where("role_id", Role::IS_FRANCHISE_STAFF)->with("franchiseStaffProfile")->whereHas('franchiseStaffProfile', function ($q) use ($franchise) {
            $q->where('franchise_id', '=', $franchise->id);
        })->get();

        return view("franchise_manager.staff.list", [
            "users" => $users
        ]);
    }


    public function create()
    {
        return view("franchise_manager.staff.create", [
            "countries" => Country::all(),
            "states" => State::all(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'min:10', 'numeric'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $request->validate([
            "image" => ["required"],
            "alt_phone" => ['nullable', 'min:10', 'numeric'],
            "country" => ["required"],
            "state" => ["required"],
            "city" => ["required"],
            "address" => ["required"],
            "postcode" => ["required"],
            "aadhar_number" => ["required", "min:16", "max:18"],
            "id_proof" => ["required"],
        ]);

        $franchise = Franchise::where("manager_id", auth()->id())->first();

        if (!$franchise) {
            Session::flash('danger', 'Please Setup Franchise Before Adding New Staff Member');
            return back();
        }

        DB::transaction(function () use ($request, $franchise) {

            $newUser = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'status' => $request->status ? 1 : 0,
                'role_id' =>  Role::IS_FRANCHISE_STAFF /* alwayse create franchise staff user */
            ];

            $staff_member = User::create($newUser);

            $imagePath = $request->file("image")->store("/profile/franchise_staff");
            $idProofPath = $request->file("id_proof")->store("/franchise_staff/id_proof");

            $newUserProfile = [
                "franchise_id" => $franchise->id,
                "user_id" => $staff_member->id,
                "image" => $imagePath,
                "alt_phone" => $request->alt_phone,
                "country_id" => $request->country,
                "state_id" => $request->state,
                "city" => $request->city,
                "address" => $request->address,
                "postcode" => $request->postcode,
                "aadhar_number" => $request->aadhar_number,
                "id_proof" => $idProofPath,
            ];

            FranchiseStaffProfile::create($newUserProfile);
        });


        Session::flash('success', 'New Staff Member has been Created');
        return back();
    }


    public function show(User $staff_member)
    {
        //
    }


    public function edit(User $staff_member)
    {
        // dd($staff_member);
        return view("franchise_manager.staff.edit", [
            "franchiseStaff" => $staff_member,
            "countries" => Country::all(),
            "states" => State::all(),
        ]);
    }

    public function update(Request $request, User $staff_member)
    {
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique("users", "email")->ignore($staff_member)],
            'phone' => ['required', 'min:10', 'numeric']
        ]);

        $request->validate([
            "alt_phone" => ['nullable', 'min:10', 'numeric'],
            "country" => ["required"],
            "state" => ["required"],
            "city" => ["required"],
            "address" => ["required"],
            "postcode" => ["required"],
            "aadhar_number" => ["required"],
        ]);
        // get delivery agent profile
        $staff_member_profile = $staff_member->profile;
        $password = $staff_member->password;

        if ($request->password) {
            if (Hash::check($request->current_password, $staff_member->password)) {
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

        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $password,
            'status' => $request->status ? 1 : 0,
        ];

        $staff_member->update($user);
        $franchise = Franchise::where("manager_id", auth()->id())->first();


        // profile img
        if ($request->file("image")) {
            Storage::delete($staff_member_profile->image);
            $imagePath = $request->file("image")->store("/profile/franchise_staff");
        } else {
            $imagePath = $staff_member_profile->image;
        }
        /* id proof */
        if ($request->file("id_proof")) {
            Storage::delete($staff_member_profile->id_proof);
            $idProofPath = $request->file("id_proof")->store("/franchise_staff/id_proof");
        } else {
            $idProofPath = $staff_member_profile->id_proof;
        }



        $userProfile = [
            "image" => $imagePath,
            "alt_phone" => $request->alt_phone,
            "country_id" => $request->country,
            "state_id" => $request->state,
            "city" => $request->city,
            "address" => $request->address,
            "postcode" => $request->postcode,
            "aadhar_number" => $request->aadhar_number,
            "id_proof" => $idProofPath,
        ];



        $staff_member_profile->update($userProfile);

        Session::flash('success', 'Staff Member has been Updated');
        return back();
    }

    public function destroy(User $staff_member)
    {
        // dd($staff_member);
        // $staff_member->delete();
        Session::flash('success', 'Staff Member has been Deleted');
        return back();
    }
}
