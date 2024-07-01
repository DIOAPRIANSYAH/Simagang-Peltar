<?php

namespace App\Http\Controllers\Pendaftar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Magang;
use App\Models\Projek;
use App\Models\User;

class PendaftaranController extends Controller
{
    public function index()
    {
        $magang = Magang::with('projek', 'user')->get();
        return view('pendaftar.pendaftaran.index', compact('magang'));
    }

    public function create()
    {
        $projek = Projek::all();
        $users = User::all();
        return view('pendaftar.pendaftaran.create', compact('projek', 'users'));
    }

    public function store(Request $request)
    {
        $magang = new Magang();

        $magang->id_projek = $request->id_projek;
        $magang->id_users = $request->id_users;
        $magang->status = $request->status;
        $magang->dosen_pembimbing_lapangan = $request->dosen_pembimbing_lapangan;
        $magang->dosen_pembimbing_kampus = $request->dosen_pembimbing_kampus;
        $magang->satuan_kerja = $request->satuan_kerja;
        $magang->tanggal_mulai = $request->tanggal_mulai;
        $magang->tanggal_berakhir = $request->tanggal_berakhir;

        if ($request->hasFile('surat_rekomendasi')) {
            $rekomendasi = $request->file('surat_rekomendasi');
            $rekomendasiName = time() . '_surat_rekomendasi.' . $rekomendasi->getClientOriginalExtension();
            $path = $rekomendasi->storeAs('public/pdf/surat_rekomendasi', $rekomendasiName);
            $magang->surat_rekomendasi = $rekomendasiName;
        }

        if ($request->hasFile('surat_pengantar')) {
            $pengantar = $request->file('surat_pengantar');
            $pengantarName = time() . '_surat_pengantar.' . $pengantar->getClientOriginalExtension();
            $path = $pengantar->storeAs('public/pdf/surat_pengantar', $pengantarName);
            $magang->surat_pengantar = $pengantarName;
        }

        $magang->save();

        return redirect()->route('pendaftar.pendaftaran.index')->with('success', 'Pendaftaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $projek = Projek::all();
        $users = User::all();
        $magang = Magang::findOrFail($id);
        return view('pendaftar.pendaftaran.edit', compact('magang', 'projek', 'users'));
    }

    public function update(Request $request, $id)
    {
        $magang = Magang::findOrFail($id);

        $magang->id_projek = $request->id_projek;
        $magang->id_users = $request->id_users;
        $magang->status = $request->status;
        $magang->dosen_pembimbing_lapangan = $request->dosen_pembimbing_lapangan;
        $magang->dosen_pembimbing_kampus = $request->dosen_pembimbing_kampus;
        $magang->satuan_kerja = $request->satuan_kerja;
        $magang->tanggal_mulai = $request->tanggal_mulai;
        $magang->tanggal_berakhir = $request->tanggal_berakhir;

        if ($request->hasFile('surat_rekomendasi')) {
            if ($magang->surat_rekomendasi) {
                Storage::delete('public/pdf/surat_rekomendasi/' . $magang->surat_rekomendasi);
            }

            $rekomendasi = $request->file('surat_rekomendasi');
            $rekomendasiName = time() . '_surat_rekomendasi.' . $rekomendasi->getClientOriginalExtension();
            $path = $rekomendasi->storeAs('public/pdf/surat_rekomendasi', $rekomendasiName);
            $magang->surat_rekomendasi = $rekomendasiName;
        }

        if ($request->hasFile('surat_pengantar')) {
            if ($magang->surat_pengantar) {
                Storage::delete('public/pdf/surat_pengantar/' . $magang->surat_pengantar);
            }

            $pengantar = $request->file('surat_pengantar');
            $pengantarName = time() . '_surat_pengantar.' . $pengantar->getClientOriginalExtension();
            $path = $pengantar->storeAs('public/pdf/surat_pengantar', $pengantarName);
            $magang->surat_pengantar = $pengantarName;
        }

        $magang->save();

        return redirect()->route('pendaftar.pendaftaran.index')->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $magang = magang::findOrFail($id);

        if ($magang->surat_rekomendasi) {
            Storage::delete('public/pdf/surat_rekomendasi/' . $magang->surat_rekomendasi);
        }

        if ($magang->surat_pengantar) {
            Storage::delete('public/pdf/surat_pengantar/' . $magang->surat_pengantar);
        }

        $magang->delete();

        return redirect()->route('pendaftar.pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
