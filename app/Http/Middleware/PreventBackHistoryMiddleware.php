<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventBackHistoryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $resposne =  $next($request);
        return $resposne->header("Cache-control", "nocache,no-store,max-age=0,must-revalidate")
            ->header("Pragam", "no-cache")
            ->header("Expires", "Sun, 02 Jan 1990 00:00:00 GMT");
    }
}
