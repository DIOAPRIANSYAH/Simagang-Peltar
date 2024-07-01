<?php

namespace App\Http\Controllers\Pendaftar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Magang;
use App\Models\Projek;
use App\Models\User;
use App\Models\Satker;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $satkers = Satker::all();

        // Ambil data Magang berdasarkan id_user auth
        $magang = Magang::where('id_users', Auth::id())->first();

        // Kirim data Magang ke view
        return view('pendaftar.pendaftaran.index', compact('magang', 'satkers'));
    }

    public function create()
    {
        $satkers = Satker::all();

        $projek = Projek::all();
        $users = User::all();
        return view('pendaftar.pendaftaran.create', compact('projek', 'users', 'satkers'));
    }

    public function store(Request $request)
    {
        // Mendapatkan user yang sedang terautentikasi
        $user = Auth::user();

        $magang = new Magang();

        $magang->id_projek = $request->id_projek;
        $magang->id_users = $user->id;
        $magang->status = 'Document Submitted';
        $magang->dosen_pembimbing_lapangan = $request->dosen_pembimbing_lapangan;
        $magang->dosen_pembimbing_kampus = $request->dosen_pembimbing_kampus;
        $magang->fakultas = $request->fakultas;
        $magang->alamat_kampus = $request->alamat_kampus;
        $magang->nomor_surat_rekomendasi = $request->nomor_surat_rekomendasi;
        $magang->satuan_kerja = $request->satuan_kerja;
        $magang->tanggal_mulai = $request->tanggal_mulai;
        $magang->tanggal_berakhir = $request->tanggal_berakhir;

        if ($request->hasFile('surat_rekomendasi')) {
            $rekomendasi = $request->file('surat_rekomendasi');
            $rekomendasiName = $user->name . '_' . $user->nomor_induk . '_surat_rekomendasi.' . $rekomendasi->getClientOriginalExtension();
            $path = $rekomendasi->storeAs('public/pdf/surat_rekomendasi', $rekomendasiName);
            $magang->surat_rekomendasi = $rekomendasiName;
        }

        if ($request->hasFile('proposal')) {
            $proposal = $request->file('proposal');
            $proposalName = $user->name . '_' . $user->nomor_induk . '_Proposal.' . $proposal->getClientOriginalExtension();
            $path = $proposal->storeAs('public/pdf/proposal', $proposalName);
            $magang->proposal = $proposalName;
        }

        if ($request->hasFile('surat_pengantar')) {
            $pengantar = $request->file('surat_pengantar');
            $pengantarName = $user->name . '_' . $user->nomor_induk . '_surat_pengantar.' . $pengantar->getClientOriginalExtension();
            $path = $pengantar->storeAs('public/pdf/surat_pengantar', $pengantarName);
            $magang->surat_pengantar = $pengantarName;
        }

        $magang->save();

        return redirect()->route('pendaftar.landingPage')->with('success', 'Pendaftaran berhasil ditambahkan.');
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
        $user = User::findOrFail($request->id_users);

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
            $rekomendasiName = $user->name . '_' . $user->nomor_induk . '_surat_rekomendasi.' . $rekomendasi->getClientOriginalExtension();
            $path = $rekomendasi->storeAs('public/pdf/surat_rekomendasi', $rekomendasiName);
            $magang->surat_rekomendasi = $rekomendasiName;
        }

        if ($request->hasFile('proposal')) {
            if ($magang->proposal) {
                Storage::delete('public/pdf/proposal/' . $magang->proposal);
            }

            $proposal = $request->file('proposal');
            $proposalName = $user->name . '_' . $user->nomor_induk . '_Proposal.' . $proposal->getClientOriginalExtension();
            $path = $proposal->storeAs('public/pdf/proposal', $proposalName);
            $magang->proposal = $proposalName;
        }

        if ($request->hasFile('surat_pengantar')) {
            if ($magang->surat_pengantar) {
                Storage::delete('public/pdf/surat_pengantar/' . $magang->surat_pengantar);
            }

            $pengantar = $request->file('surat_pengantar');
            $pengantarName = $user->name . '_' . $user->nomor_induk . '_surat_pengantar.' . $pengantar->getClientOriginalExtension();
            $path = $pengantar->storeAs('public/pdf/surat_pengantar', $pengantarName);
            $magang->surat_pengantar = $pengantarName;
        }

        $magang->save();

        return redirect()->route('pendaftar.pendaftaran.index')->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $magang = Magang::findOrFail($id);

        if ($magang->surat_rekomendasi) {
            Storage::delete('public/pdf/surat_rekomendasi/' . $magang->surat_rekomendasi);
        }

        if ($magang->proposal) {
            Storage::delete('public/pdf/proposal/' . $magang->proposal);
        }

        if ($magang->surat_pengantar) {
            Storage::delete('public/pdf/surat_pengantar/' . $magang->surat_pengantar);
        }

        $magang->delete();

        return redirect()->route('pendaftar.pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
