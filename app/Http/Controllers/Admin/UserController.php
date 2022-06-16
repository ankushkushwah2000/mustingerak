<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        return view("admin.users.list", [
            "users" => User::with("role")->get()
        ]);
    }


    public function create()
    {
        return view("admin.users.create", [
            "roles" => Role::whereIn("id", [Role::IS_CUSTOMER, Role::IS_SELLER, Role::IS_HUB_MANAGER, Role::IS_FRANCHISE_MANAGER])->get()
        ]); //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique("users", "email")],
            'phone' => ['required', 'numeric', Rule::unique("users", "phone")],
            'role' => ['required'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status ? 1 : 0,
            'password' => Hash::make($request->password),
            'role_id' => $request->role ?? 4 /*create normal user if no role selected */
        ]);

        session()->flash('info', 'New User has been created');
        return back();
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view("admin.users.edit", [
            "user" => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        // dump($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique("users", "email")->ignore($user)],

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

        $user = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'status' => $request->status ? 1 : 0,
        ]);

        Session::flash('info', 'User has been updated');
        return back();
    }

    public function destroy(User $user)
    {
        //
    }
}
