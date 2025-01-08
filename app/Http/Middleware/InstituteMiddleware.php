<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class InstituteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {  
        if (Auth::check()) {
            // Assuming the user has a 'role' attribute or relationship
            $user = Auth::user();

            // Check if the user has either 'superadmin' or 'institute' roles
            if ($user->admin_role == 'instituteadmin') {
                return $next($request);
            }

            // If the user doesn't have the required roles
            //return redirect()->route('no-access')->with('error', 'You do not have permission to access this page.');
        } else {
            return redirect()->route('institute.login');
        }
}
}