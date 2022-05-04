<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    public function handle(Request $request, Closure $next, $userType)
    {
        if (auth()->user()->tipe == $userType) {
            return $next($request);
        }

        return response()->json(['You do not have permission to access for this page.']);
        // return $next($request);
    }
}