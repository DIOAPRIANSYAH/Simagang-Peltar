<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAnggota
{
    public function handle($request, Closure $next, $guard = 'anggota')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
