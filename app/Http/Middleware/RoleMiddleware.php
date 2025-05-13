<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        // Jika belum login
        if (!$user) {
            return abort(403, 'Kamu belum login.');
        }

        // Jika role tidak sesuai
        if ($user->role !== $role) {
            return abort(403, 'Akses ditolak: hanya pengguna dengan role ' . $role . ' yang diizinkan.');
        }

        return $next($request);
    }
}
