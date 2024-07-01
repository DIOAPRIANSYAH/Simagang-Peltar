<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected function redirectTo()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Redirect based on user's type
        if ($user->type == 'pic_satker') {
            return route('pic_satker.dashboard');
        } elseif ($user->type == 'admin') {
            return route('admin.dashboard');
        } else {
            return route('pendaftar.dashboard');
        }
    }
}
