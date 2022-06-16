<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function states()
    {
        return view("admin.geo.states", [
            "states" => State::all()
        ]);
    }
}
