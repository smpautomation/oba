<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        $user = Auth::user();

        // Check if user has a role
        if (!$user->role) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Account not properly configured');
        }

        $userRole = $user->role->name;

        // Check if user's role is allowed
        if (!in_array($userRole, $roles)) {
            return back()->with('error', 'You do not have permission to access this page');
        }

        return $next($request);
    }

}
