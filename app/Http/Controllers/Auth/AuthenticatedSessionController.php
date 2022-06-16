<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Check if user is active
        if (!Auth::user()->status) {
            Auth::logout();
            return redirect('login')->withErrors(["email" => 'Your account is inactive, Contact Admin']);
        }

        // Check for unAuthorizedRoles
        $unAuthorizedRoles = [Role::IS_CUSTOMER, Role::IS_AGENT];

        if (in_array(Auth::user()->role_id, $unAuthorizedRoles)) {
            Auth::logout();
            return redirect('login')->withErrors(["email" => 'These credentials do not match our records.']);
        }

        switch (auth()->user()->role_id) {
            case 1:
                /* Admin */
                return redirect()->route("admin.dashboard");
                break;
            case 2:
                /* Seller */
                return redirect()->route("seller.dashboard");
                break;

            default:
                return redirect()->route("/");
                break;
        }

        return redirect()->route("/");
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
