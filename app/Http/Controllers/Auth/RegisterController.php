<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/pendaftar/landingPage';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'provinsi' => ['string', 'max:100'],
            'kabupaten' => ['string', 'max:100'],
            'kecamatan' => ['string', 'max:100'],
            'desa' => ['string', 'max:100'],
            'tgl_lahir' => ['date'],
            'agama' => ['string', 'max:50'],
            'jenis_kelamin' => ['string', 'in:Laki-laki,Perempuan'],
            'nama_sekolah' => ['string', 'max:255'],
            'pendidikan' => ['string', 'max:50'],
            'jurusan' => ['string', 'max:100'],
            'nomor_induk' => ['string', 'max:50'],
            'no_hp' => ['string', 'max:20'],
            'sertifikat_kelulusan' => ['nullable', 'string', 'max:500'],
            'foto' => ['nullable', 'string', 'max:500'],
            'cv' => ['nullable', 'string', 'max:500'],
            'link_profile_linkedin' => ['nullable', 'string', 'max:255'],
            'link_profile_instagram' => ['nullable', 'string', 'max:255'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'id' => (string) Str::uuid(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'provinsi' => $data['provinsi'] ?? null,
            'kabupaten' => $data['kabupaten'] ?? null,
            'kecamatan' => $data['kecamatan'] ?? null,
            'desa' => $data['desa'] ?? null,
            'tgl_lahir' => $data['tgl_lahir'] ?? null,
            'agama' => $data['agama'] ?? null,
            'jenis_kelamin' => $data['jenis_kelamin'] ?? null,
            'nama_sekolah' => $data['nama_sekolah'] ?? null,
            'pendidikan' => $data['pendidikan'] ?? null,
            'jurusan' => $data['jurusan'] ?? null,
            'nomor_induk' => $data['nomor_induk'] ?? null,
            'no_hp' => $data['no_hp'] ?? null,
            'sertifikat_kelulusan' => $data['sertifikat_kelulusan'] ?? null,
            'foto' => $data['foto'] ?? null,
            'cv' => $data['cv'] ?? null,
            'link_profile_linkedin' => $data['link_profile_linkedin'] ?? null,
            'link_profile_instagram' => $data['link_profile_instagram'] ?? null,
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('sweet_error', 'Email sudah terdaftar.');
        }

        $this->create($request->all());

        return redirect($this->redirectPath())
            ->with('sweet_success', 'Registrasi berhasil. Silakan cek email Anda untuk verifikasi.');
    }
}
