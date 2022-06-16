<?php

namespace App\Http\Controllers\DeliveryAgent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {

        $user = auth()->user();
        $user->load("role");

        return view("delivery_agent.dashboard", [
            "user" => $user
        ]);
    }
}
