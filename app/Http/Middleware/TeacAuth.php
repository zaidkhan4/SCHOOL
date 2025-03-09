<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;  // Corrected import
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeacAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('teacher')->check()) {
            return redirect()->route('teacher.login');
        }
        return $next($request);
    }
}
