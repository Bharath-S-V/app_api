<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // If no guards are passed, check for the 'admin' guard specifically
        if (Auth::guard('admin')->check()) {
            return $next($request);  // Allow access for authenticated admin
        }

        // If the user is not authenticated as an admin, redirect them to the admin login page
        if ($request->is('admin/*')) {
            return redirect()->route('admin.login');  // Redirect to admin login
        }

        // If the user is not authenticated, redirect them to the default login page
        return redirect()->route('login');  // Default login
    }
}
