<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Magang;
use App\Models\Projek;
use App\Models\User;
use App\Models\Satker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Mail\SuratPengantarMail;
use App\Mail\StatusUpdateMail;
use Illuminate\Support\Facades\Mail;

class LolosSeleksiController extends Controller
{
    public function index()
    {
        $magang = Magang::with('user')
            ->where('status', 'Accepted')
            ->get();

        $magang->transform(function ($item) {
            $item->tanggal_mulai_formatted = Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y');
            $item->tanggal_berakhir_formatted = Carbon::parse($item->tanggal_berakhir)->translatedFormat('d F Y');
            return $item;
        });

        $satkers = Satker::all();

        return view('admin.lolos-seleksi.index', compact('magang', 'satkers'));
    }

    public function show($encryptedId)
    {
        $magang = Magang::findByEncryptedId($encryptedId);
        $magang->load('user', 'projek');
        return view('admin.lolos-seleksi.show', compact('magang'));
    }


    public function create()
    {
        $satkers = Satker::all();

        $projek = Projek::all();
        $users = User::all();
        return view('admin.lolos-seleksi.create', compact('projek', 'users', 'satkers'));
    }

    public function store(Request $request)
    {
        // Mendapatkan user yang sedang terautentikasi
        $user = Auth::user();

        $magang = new Magang();

        $magang->id_projek = $request->id_projek;
        $magang->id_users = $user->id;
        $magang->status = $request->status;
        $magang->dosen_pembimbing_lapangan = $request->dosen_pembimbing_lapangan;
        $magang->dosen_pembimbing_kampus = $request->dosen_pembimbing_kampus;
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

        return redirect()->route('lolos-seleksi.index')->with('success', 'Pendaftaran berhasil ditambahkan.');
    }


    public function edit($encryptedId)
    {
        $satkers = Satker::all();

        $projek = Projek::all();
        $users = User::all();
        $magang = Magang::findByEncryptedId($encryptedId);
        return view('admin.lolos-seleksi.edit', compact('magang', 'satkers', 'projek', 'users'));
    }

    public function update(Request $request, $encryptedId)
    {
        $magang = Magang::findByEncryptedId($encryptedId);
        $id_users = $magang->id_users;
        $user = $magang->user;

        $magang->id_projek = $request->id_projek;
        $magang->id_users = $id_users;
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
            $rekomendasiName = $magang->user->name . '_' . $magang->user->nomor_induk . '_surat_rekomendasi.' . $rekomendasi->getClientOriginalExtension();
            $path = $rekomendasi->storeAs('public/pdf/surat_rekomendasi', $rekomendasiName);
            $magang->surat_rekomendasi = $rekomendasiName;
        }

        if ($request->hasFile('proposal')) {
            if ($magang->proposal) {
                Storage::delete('public/pdf/proposal/' . $magang->proposal);
            }

            $proposal = $request->file('proposal');
            $proposalName = $magang->user->name . '_' . $magang->user->nomor_induk . '_Proposal.' . $proposal->getClientOriginalExtension();
            $path = $proposal->storeAs('public/pdf/proposal', $proposalName);
            $magang->proposal = $proposalName;
        }

        if ($request->hasFile('surat_pengantar')) {
            if ($magang->surat_pengantar) {
                Storage::delete('public/pdf/surat_pengantar/' . $magang->surat_pengantar);
            }

            $pengantar = $request->file('surat_pengantar');
            $pengantarName = $magang->user->name . '_' . $magang->user->nomor_induk . '_surat_pengantar.' . $pengantar->getClientOriginalExtension();
            $path = $pengantar->storeAs('public/pdf/surat_pengantar', $pengantarName);
            $magang->surat_pengantar = $pengantarName;

            // Kirim email dengan lampiran surat pengantar
            $attachmentPath = storage_path('app/public/pdf/surat_pengantar/' . $pengantarName);
            if (file_exists($attachmentPath)) {
                $mail = new SuratPengantarMail($user, $attachmentPath);
                Mail::to($user->email)->send($mail);
            }
        }

        $magang->save();

        // Kirim email update status
        Mail::to($user->email)->send(new StatusUpdateMail($user->name, $magang->status));

        return redirect()->route('lolos-seleksi.index')->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    public function destroy($encryptedId)
    {
        $magang = Magang::findByEncryptedId($encryptedId);

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

        return redirect()->route('lolos-seleksi.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
