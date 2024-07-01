<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
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

        $anggota = User::all();
        return view('anggota.profile.index', compact('user', 'satkers'));
    }

    public function edit($encryptedId)
    {
        $satkers = Satker::all();
        $anggota = Anggota::findByEncryptedId($encryptedId);

        if ($anggota) {
            return view('anggota.profile.index', compact('anggota', 'satkers'));
        } else {
            return redirect()->route('profile.index')->with('error', 'Anggota tidak ditemukan.');
        }
    }

    public function update(Request $request, $encryptedId)
    {
        $anggota = Anggota::findByEncryptedId($encryptedId);

        if ($anggota) {
            $anggota->provinsi = $request->provinsi ?: $request->original_provinsi;
            $anggota->kabupaten = $request->kabupaten ?: $request->original_kabupaten;
            $anggota->kecamatan = $request->kecamatan ?: $request->original_kecamatan;
            $anggota->desa = $request->desa ?: $request->original_desa;

            $anggota->nama = $request->nama;
            $anggota->tgl_lahir = $request->tgl_lahir;
            $anggota->agama = $request->agama;
            $anggota->jenis_kelamin = $request->jenis_kelamin;
            $anggota->nama_sekolah = $request->nama_sekolah;
            $anggota->pendidikan = $request->pendidikan;
            $anggota->jurusan = $request->jurusan;
            $anggota->nomor_induk = $request->nomor_induk;
            $anggota->no_hp = $request->no_hp;
            $anggota->email = $request->email;
            $anggota->link_profile_linkedin = $request->link_profile_linkedin;
            $anggota->link_profile_instagram = $request->link_profile_instagram;

            if ($request->filled('password')) {
                $anggota->password = Hash::make($request->password);
            }

            // Handle upload foto
            if ($request->hasFile('foto')) {
                // Hapus gambar lama
                if ($anggota->foto) {
                    Storage::delete('public/images/anggota/' . $anggota->foto);
                }

                $image = $request->file('foto');
                $imageName = $request->nama . '_' . $request->nomor_induk . '_fotoProfil.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/images/anggota', $imageName);
                $anggota->foto = $imageName;
            }

            // Handle upload sertifikat_kelulusan
            if ($request->hasFile('sertifikat_kelulusan')) {
                if ($anggota->sertifikat_kelulusan) {
                    Storage::delete('public/pdf/sertifikat_kelulusan/' . $anggota->sertifikat_kelulusan);
                }

                $pdf = $request->file('sertifikat_kelulusan');
                $pdfName = $request->nama . '_' . $request->nomor_induk . '_sertifikat.' . $pdf->getClientOriginalExtension();
                $path = $pdf->storeAs('public/pdf/sertifikat_kelulusan', $pdfName);
                $anggota->sertifikat_kelulusan = $pdfName;
            }

            // Handle upload cv
            if ($request->hasFile('cv')) {
                if ($anggota->cv) {
                    Storage::delete('public/pdf/cv/' . $anggota->cv);
                }

                $pdf = $request->file('cv');
                $pdfName = $request->nama . '_' . $request->nomor_induk . '_cv.' . $pdf->getClientOriginalExtension();
                $path = $pdf->storeAs('public/pdf/cv', $pdfName);
                $anggota->cv = $pdfName;
            }

            $anggota->save();

            return redirect()->route('anggota.profile.edit', $encryptedId)->with('success', 'Anggota berhasil diperbarui.');
        } else {
            return redirect()->route('profile.index')->with('error', 'Anggota tidak ditemukan.');
        }
    }
}
