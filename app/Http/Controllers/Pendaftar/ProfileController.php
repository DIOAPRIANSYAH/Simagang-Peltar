<?php

namespace App\Http\Controllers\Pendaftar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Satker;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    public function index()
    {
        $satkers = Satker::all();

        $user = User::all();
        return view('pendaftar.profile.index', compact('user', 'satkers'));
    }

    public function edit($encryptedId)
    {
        $satkers = Satker::all();
        $user = User::findByEncryptedId($encryptedId);

        if ($user) {
            return view('pendaftar.profile.index', compact('user', 'satkers'));
        } else {
            return redirect()->route('profile.index')->with('error', 'User tidak ditemukan.');
        }
    }

    public function update(Request $request, $encryptedId)
    {
        $user = User::findByEncryptedId($encryptedId);

        if ($user) {
            $user->provinsi = $request->provinsi ?: $request->original_provinsi;
            $user->kabupaten = $request->kabupaten ?: $request->original_kabupaten;
            $user->kecamatan = $request->kecamatan ?: $request->original_kecamatan;
            $user->desa = $request->desa ?: $request->original_desa;

            $user->name = $request->name;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->agama = $request->agama;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->nama_sekolah = $request->nama_sekolah;
            $user->pendidikan = $request->pendidikan;
            $user->jurusan = $request->jurusan;
            $user->nomor_induk = $request->nomor_induk;
            $user->no_hp = $request->no_hp;
            $user->email = $request->email;
            $user->link_profile_linkedin = $request->link_profile_linkedin;
            $user->link_profile_instagram = $request->link_profile_instagram;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            // Handle upload foto
            if ($request->hasFile('foto')) {
                // Hapus gambar lama
                if ($user->foto) {
                    Storage::delete('public/images/users/' . $user->foto);
                }

                $image = $request->file('foto');
                $imageName = $request->name . '_' . $request->nomor_induk . '_fotoProfil.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/images/users', $imageName);
                $user->foto = $imageName;
            }

            // Handle upload sertifikat_kelulusan
            if ($request->hasFile('sertifikat_kelulusan')) {
                if ($user->sertifikat_kelulusan) {
                    Storage::delete('public/pdf/sertifikat_kelulusan/' . $user->sertifikat_kelulusan);
                }

                $pdf = $request->file('sertifikat_kelulusan');
                $pdfName = $request->name . '_' . $request->nomor_induk . '_sertifikat.' . $pdf->getClientOriginalExtension();
                $path = $pdf->storeAs('public/pdf/sertifikat_kelulusan', $pdfName);
                $user->sertifikat_kelulusan = $pdfName;
            }

            // Handle upload cv
            if ($request->hasFile('cv')) {
                if ($user->cv) {
                    Storage::delete('public/pdf/cv/' . $user->cv);
                }

                $pdf = $request->file('cv');
                $pdfName = $request->name . '_' . $request->nomor_induk . '_cv.' . $pdf->getClientOriginalExtension();
                $path = $pdf->storeAs('public/pdf/cv', $pdfName);
                $user->cv = $pdfName;
            }

            $user->save();

            return redirect()->route('profile.edit', $encryptedId)->with('success', 'User berhasil diperbarui.');
        } else {
            return redirect()->route('profile.index')->with('error', 'User tidak ditemukan.');
        }
    }
}
