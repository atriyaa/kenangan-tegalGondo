<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login dan memiliki role admin
        if (! $request->user() || ! $request->user()->isAdmin()) {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk Admin Desa Tegalgondo.');
        }

        return $next($request);
    }
}