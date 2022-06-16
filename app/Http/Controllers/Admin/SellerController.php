<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SellerController extends Controller
{


    public function index()
    {
        return view("admin.sellers.list", [
            "sellers" => User::where("role_id", 2)->get()
        ]);
    }


    public function create()
    {
        return view("admin.sellers.create");
    }



    public function store(Request $request)
    {
        //
    }



    public function show(User $seller)
    {
        //
    }



    public function edit(User $seller)
    {
        return view("admin.sellers.edit", [
            "seller" => $seller
        ]);
    }


    public function update(Request $request, User $seller)
    {
        dd($request->all());
    }

    public function destroy(User $seller)
    {
        //
    }
}
