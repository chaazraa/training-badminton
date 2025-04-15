<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role !== 'admin')
        {
            if (Auth::user()->role === 'coach') {
                return redirect()->route('coach.dashboard');
            } if (Auth::user()->role === 'user') {
                return redirect()->route('user.dashboard');
            } else {
                return redirect()->route('dashboard'); // Redirect default jika tidak ada role
            } 
        }

        return $next($request); 
    }
}
