<?php

namespace App\Http\Controllers\DeliveryAgent;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\DeliveryAgentProfile;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view("delivery_agent.profile", [
            "user" =>  User::findOrFail(auth()->id()),
            "countries" => Country::all(),
            "states" => State::all(),
        ]);
    }
}
