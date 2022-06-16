<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {

        $user = auth()->user();
        $user->load("role");

        return view("admin.dashboard", [
            "user" => $user
        ]);
    }
}
