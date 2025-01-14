<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
               // Check if the user is authenticated
               if (!Auth::check()) {
                // Redirect to the login page if not logged in
                return redirect()->route('admin.login');
            }
    
            // User is logged in, proceed with the request
            return $next($request);
    }
}
