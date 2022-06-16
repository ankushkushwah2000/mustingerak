<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch (auth()->user()->role_id) {
                    case Role::IS_ADMIN:
                        /* Admin */
                        return redirect()->route("admin.dashboard");
                        break;

                    case Role::IS_SELLER:
                        /* Seller */
                        return redirect()->route("seller.dashboard");
                        break;

                    case Role::IS_HUB_MANAGER:
                        /* Hub */
                        return redirect()->route("hub.dashboard");
                        break;

                    case Role::IS_DELIVERY_AGENT:
                        /* delivery_agent */
                        return redirect()->route("delivery_agent.dashboard");
                        break;

                    case Role::IS_FRANCHISE_MANAGER:
                        /* franchise_manager  */
                        return redirect()->route("franchise_manager.dashboard");
                        break;

                    case Role::IS_FRANCHISE_STAFF:
                        /* franchise_staff  */
                        return redirect()->route("franchise_staff.dashboard");
                        break;

                    default:
                        return redirect(RouteServiceProvider::HOME);
                        break;
                }
            }
        }

        return $next($request);
    }
}
