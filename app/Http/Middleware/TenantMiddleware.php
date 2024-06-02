<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_id == 3) {
            return $next($request);
        }

        // Redirect to dashboard only if the user is authenticated but not a tenant
        if (Auth::check()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
        }

        // Redirect to login if not authenticated
        return redirect()->route('login');
    }
}
