<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class LinkedinController extends Controller
{
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedinCallback()
    {
        try {
            $user = Socialite::driver('linkedin')->user();

            $finduser = User::where('linkedin_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('beranda');
            } else {
                $newUser = User::updateOrCreate(
                    ['email' => $user->email],
                    [
                        'name' => $user->name,
                        'linkedin_id' => $user->id,
                        'password' => Hash::make('password')
                    ]
                );
                Auth::login($newUser);
                return redirect()->intended('beranda');
            }
        } catch (Exception $e) {
            dd("Error: " . $e->getMessage(), $e); // Tampilkan rincian kesalahan
        }
    }
}
