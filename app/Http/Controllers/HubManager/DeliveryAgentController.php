<?php

namespace App\Http\Controllers\HubManager;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\DeliveryAgentProfile;
use App\Models\Hub;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class DeliveryAgentController extends Controller
{
    public function index()
    {

        $hub = Hub::where("user_id", auth()->id())->first();
        // dd($hub->delivery_agents);

        $users = User::where("role_id", Role::IS_DELIVERY_AGENT)->with("deliveryAgentProfile")->whereHas('deliveryAgentProfile', function ($q) use ($hub) {
            $q->where('hub_id', '=', $hub->id);
        })->get();

        return view("hub_manager.delivery_agents.list", [
            "users" => $users
        ]);
    }


    public function create()
    {
        return view("hub_manager.delivery_agents.create", [
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
            "alt_phone" => ['numeric'],
            "country" => ["required"],
            "state" => ["required"],
            "city" => ["required"],
            "address" => ["required"],
            "postcode" => ["required"],
            "aadhar_number" => ["required", "min:16", "max:18"],
            "id_proof" => ["required"],
            "driving_licence" => ["required"],
        ]);

        $hub = Hub::where("user_id", auth()->id())->first();

        if (!$hub) {
            Session::flash('danger', 'Please Create Hub Before Adding New Delivery agent');
            return back();
        }

        $newUser = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => $request->status ? 1 : 0,
            'role_id' =>  Role::IS_DELIVERY_AGENT /* alwayse create delivery agent user */
        ];

        $delivery_agent = User::create($newUser);

        $imagePath = $request->file("image")->store("/profile/delivery_agents");
        $idProofPath = $request->file("id_proof")->store("/delivery_agents/id_proof");
        $drivingLicencePath = $request->file("driving_licence")->store("/delivery_agents/driving_licences");

        $newUserProfile = [
            "hub_id" => $hub->id,
            "user_id" => $delivery_agent->id,
            "image" => $imagePath,
            "alt_phone" => $request->alt_phone,
            "country_id" => $request->country,
            "state_id" => $request->state,
            "city" => $request->city,
            "address" => $request->address,
            "postcode" => $request->postcode,
            "aadhar_number" => $request->aadhar_number,
            "id_proof" => $idProofPath,
            "driving_licence" => $drivingLicencePath,
        ];

        DeliveryAgentProfile::create($newUserProfile);

        Session::flash('success', 'New Delivery agent has been Created');
        return back();
    }


    public function show(User $delivery_agent)
    {
        //
    }


    public function edit(User $delivery_agent)
    {
        return view("hub_manager.delivery_agents.edit", [
            "delivery_agent" => $delivery_agent,
            "countries" => Country::all(),
            "states" => State::all(),
        ]);
    }

    public function update(Request $request, User $delivery_agent)
    {
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique("users", "email")->ignore($delivery_agent)],
            'phone' => ['required', 'min:10', 'numeric']
        ]);

        $request->validate([
            "alt_phone" => ['numeric'],
            "country" => ["required"],
            "state" => ["required"],
            "city" => ["required"],
            "address" => ["required"],
            "postcode" => ["required"],
            "aadhar_number" => ["required"],
        ]);
        // get delivery agent profile
        $delivery_agent_profile = $delivery_agent->profile;
        $password = $delivery_agent->password;

        if ($request->password) {
            if (Hash::check($request->current_password, $delivery_agent->password)) {
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

        $delivery_agent->update($user);
        $hub = Hub::where("user_id", auth()->id())->first();

        // profile img
        if ($request->file("image")) {
            Storage::delete($delivery_agent_profile->image);
            $imagePath = $request->file("image")->store("/profile/delivery_agents");
        } else {
            $imagePath = $delivery_agent_profile->image;
        }
        /* id proof */
        if ($request->file("id_proof")) {
            Storage::delete($delivery_agent_profile->id_proof);
            $idProofPath = $request->file("id_proof")->store("/delivery_agents/id_proof");
        } else {
            $idProofPath = $delivery_agent_profile->id_proof;
        }
        /* dl */
        if ($request->file("driving_licence")) {
            Storage::delete($delivery_agent_profile->driving_licence);
            $drivingLicencePath = $request->file("driving_licence")->store("/delivery_agents/driving_licences");
        } else {
            $drivingLicencePath =  $delivery_agent_profile->driving_licence;
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
            "driving_licence" => $drivingLicencePath,
        ];



        $delivery_agent_profile->update($userProfile);

        Session::flash('success', 'Delivery agent has been Updated');
        return back();
    }

    public function destroy(User $delivery_agent)
    {
        // dd($delivery_agent);
        // $delivery_agent->delete();
        Session::flash('success', 'Delivery agent has been Deleted');
        return back();
    }
}
