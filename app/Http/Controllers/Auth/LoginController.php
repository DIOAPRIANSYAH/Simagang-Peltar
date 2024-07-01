<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert; // Import class Alert

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login for 'pic_satker' and 'admin'
        if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            if (auth()->user()->type == 'pic_satker') {
                return redirect()->route('pic_satker.dashboard');
            } elseif (auth()->user()->type == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('pendaftar.landingPage');
            }
        }

        // Cek login untuk pengguna dengan type 'anggota'
        elseif (auth()->guard('anggota')->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $user = auth()->guard('anggota')->user();

            // Pengecekan apakah pengguna 'anggota' sudah terverifikasi email-nya
            if ($user->is_verified != 1) {
                auth()->guard('anggota')->logout();
                return redirect()->route('login')->with('error', 'Anda perlu menunggu validasi ketua kelompok magang');;
            }

            // Redirect ke dashboard 'anggota' jika sudah terverifikasi
            return redirect()->route('anggota.dashboard');
        }

        return redirect()->route('login')
            ->with('error', 'Email atau Password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
