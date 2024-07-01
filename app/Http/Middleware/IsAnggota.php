<?php
// app/Http/Middleware/IsAnggota.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAnggota
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('anggota')->check()) {
            return $next($request);
        }
        return redirect('/login-anggota');
    }
}
