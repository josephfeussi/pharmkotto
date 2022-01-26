<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffOnly
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
        if (Auth::user() &&  in_array(Auth::user()->role, ['staff, admin'])) {
            return $next($request);
       }
       throw response()->json(["message" => "You do not have access to this resource"]);
    }
}
