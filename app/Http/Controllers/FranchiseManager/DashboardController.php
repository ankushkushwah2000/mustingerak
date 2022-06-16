<?php

namespace App\Http\Controllers\FranchiseManager;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Hub;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = auth()->user();
        $user->load("role");
        return view("franchise_manager.dashboard", [
            "user" => $user
        ]);
    }
}
