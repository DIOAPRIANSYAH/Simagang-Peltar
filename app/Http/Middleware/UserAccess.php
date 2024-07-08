<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $userType
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next, $userType)
    {
        if (auth()->check() && auth()->user()->type == $userType) {
            return $next($request);
        }

        return response()->view('components.error', [
            'message' => 'You do not have permission to access this page.',
            'user_type' => auth()->user()->type ?? 'guest',
            'required_type' => $userType,
        ], 403);
    }
}
