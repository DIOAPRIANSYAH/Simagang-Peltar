<?php

namespace App\Http\Controllers\Pendaftar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Anggota;
use Illuminate\Support\Facades\Auth;
use App\Models\Satker;

class AnggotaController extends Controller
{
    public function index()
    {
        $satkers = Satker::all();

        $anggota = Anggota::all();
        return view('pendaftar.anggota.index', compact('anggota', 'satkers'));
    }

    public function create()
    {
        $satkers = Satker::all();

        return view('pendaftar.anggota.create', compact('satkers'));
    }
    public function store(Request $request)
    {
        $anggota = new Anggota();
        $anggota->id_users = Auth::user()->id;
        $anggota->nama = $request->nama;
        $anggota->provinsi = $request->provinsi;
        $anggota->kabupaten = $request->kabupaten;
        $anggota->kecamatan = $request->kecamatan;
        $anggota->desa = $request->desa;
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

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $request->nama . '_' . $request->nomor_induk . '_fotoProfil.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images/anggota', $imageName);
            $anggota->foto = $imageName;
        }

        // Handle upload sertifikat_kelulusan
        if ($request->hasFile('sertifikat_kelulusan')) {
            $pdf = $request->file('sertifikat_kelulusan');
            $pdfName = $request->nama . '_' . $request->nomor_induk . '_sertifikat.' . $pdf->getClientOriginalExtension();
            $path = $pdf->storeAs('public/pdf/sertifikat_kelulusan', $pdfName);
            $anggota->sertifikat_kelulusan = $pdfName;
        }


        // Handle upload cv
        if ($request->hasFile('cv')) {
            $pdf = $request->file('cv');
            $pdfName = $request->nama . '_' . $request->nomor_induk . '_cv.' . $pdf->getClientOriginalExtension();
            $path = $pdf->storeAs('public/pdf/cv', $pdfName);
            $anggota->cv = $pdfName;
        }

        $anggota->save();


        // Redirect ke halaman index anggota dengan pesan sukses
        return redirect()->route('pendaftar.landingPage')->with('success', 'anggota ' . $anggota->nama . ' berhasil ditambahkan.');
    }


    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('pendaftar.anggota.show', compact('anggota'));
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('pendaftar.anggota.index', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->provinsi = $request->provinsi ?: $request->original_provinsi;
        $anggota->kabupaten = $request->kabupaten ?: $request->original_kabupaten;
        $anggota->kecamatan = $request->kecamatan ?: $request->original_kecamatan;
        $anggota->desa = $request->desa ?: $request->original_desa;

        $anggota->id_users = Auth::user()->id;

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
        $anggota->status = $request->status;
        $anggota->link_profile_linkedin = $request->link_profile_linkedin;
        $anggota->link_profile_instagram = $request->link_profile_instagram;

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
            // Hapus PDF lama
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
            // Hapus PDF lama
            if ($anggota->cv) {
                Storage::delete('public/pdf/cv/' . $anggota->cv);
            }

            $pdf = $request->file('cv');
            $pdfName = $request->nama . '_' . $request->nomor_induk . '_cv.' . $pdf->getClientOriginalExtension();
            $path = $pdf->storeAs('public/pdf/cv', $pdfName);
            $anggota->cv = $pdfName;
        }

        $anggota->save();

        // Redirect ke halaman index anggota dengan pesan sukses
        return redirect()->route('anggota.index')->with('success', 'anggota berhasil diperbarui.');
    }

    public function destroy($encryptedId)
    {
        $anggota = Anggota::findByEncryptedId($encryptedId);

        // Hapus gambar terkait jika ada
        if ($anggota->foto) {
            Storage::delete('public/images/anggota/' . $anggota->foto);
        }

        // Hapus sertifikat kelulusan terkait jika ada
        if ($anggota->sertifikat_kelulusan) {
            Storage::delete('public/pdf/sertifikat_kelulusan/' . $anggota->sertifikat_kelulusan);
        }

        // Hapus cv terkait jika ada
        if ($anggota->cv) {
            Storage::delete('public/pdf/cv/' . $anggota->cv);
        }

        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'anggota berhasil dihapus.');
    }
}
