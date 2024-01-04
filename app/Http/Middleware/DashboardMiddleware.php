<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class DashboardMiddleware
{
    public function handle($request, Closure $next, $expectedRole)
    {
        // Retrieve the user's role from the session
        $userRole = Session::get('authenticate')->peran;
    
        // Check if the user has the expected role for the route
        if ($userRole === $expectedRole) {
            // You can perform any additional checks or actions here
            return $next($request);
        }

        // If the role doesn't match, you can redirect or return a response as needed.
        return redirect()->route('dashboard');
    }
}
