<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Satker;
use App\Models\Anggota;
use Illuminate\Support\Facades\Auth;
use App\Models\Magang;

class MonitoringController extends Controller
{
    public function index()
    {
        $satkers = Satker::all();

        // Cari Anggota berdasarkan id_users dari pengguna yang sedang masuk
        $anggota = Anggota::where('id_users', Auth::id())->first();

        if (!$anggota) {
            return "Anggota tidak ditemukan untuk user saat ini.";
            // Atau bisa juga redirect ke halaman lain, atau tampilkan pesan error
        }

        // Ambil data Magang berdasarkan id_magang yang terhubung dengan Anggota
        $magang = $anggota->magang;

        if (!$magang) {
            return "Data magang tidak ditemukan untuk anggota ini.";
            // Atau bisa juga redirect ke halaman lain, atau tampilkan pesan error
        }

        // Hitung jumlah status yang tidak sama dengan 'Document Submitted'
        $statusCount = Magang::where('status', '!=', 'Document Submitted')
            ->where('id', $magang->id)
            ->count();

        return view('anggota.monitoring.index', compact('magang', 'satkers', 'statusCount'));
    }
}
