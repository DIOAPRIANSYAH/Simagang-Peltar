<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('anggota')->attempt($credentials)) {
            return redirect()->intended(route('anggota.dashboard'));
        }

        return redirect()->back()->withErrors(['email' => 'Login details are not valid']);
    }
}
