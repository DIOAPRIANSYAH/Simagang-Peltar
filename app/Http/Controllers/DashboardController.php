<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Magang;
use App\Models\Anggota;

class DashboardController extends Controller
{
    public function index()
    {
        // Jumlah total user
        $totalUsers = User::count();

        // Jumlah total user + anggota
        $totalUsersAndMembers = User::count() + Anggota::count();

        // Jumlah magang dengan status accepted
        $totalAcceptedInternships = Magang::where('status', 'accepted')->count();

        // Jumlah magang dengan status rejected
        $totalRejectedInternships = Magang::where('status', 'rejected')->count();

        // Data gender dari tabel User
        $userGenderCounts = User::select('jenis_kelamin', DB::raw('count(*) as total'))
            ->groupBy('jenis_kelamin')
            ->get();

        // Data gender dari tabel Anggota
        $anggotaGenderCounts = Anggota::select('jenis_kelamin', DB::raw('count(*) as total'))
            ->groupBy('jenis_kelamin')
            ->get();

        // Dapatkan jumlah magang dengan status tertentu
        $documentSubmittedCount = Magang::where('status', 'Document Submitted')->count();
        $onReviewCount = Magang::where('status', 'On Review')->count();
        $acceptedCount = Magang::where('status', 'Accepted')->count();
        $rejectedCount = Magang::where('status', 'Rejected')->count();

        // Dapatkan jumlah users berdasarkan satuan kerja
        $usersBySatuanKerja = Magang::select('satuan_kerja', DB::raw('count(*) as total'))
            ->groupBy('satuan_kerja')
            ->get();

        // Dapatkan data jumlah mahasiswa dari tiap jenis kampus
        $mahasiswaByKampus = User::select('nama_sekolah', DB::raw('count(*) as total'))
            ->groupBy('nama_sekolah')
            ->get();

        // Siapkan data untuk line chart
        $lineChartData = collect();
        foreach ($mahasiswaByKampus as $data) {
            $lineChartData->push([
                'nama_sekolah' => $data->nama_sekolah,
                'jumlah_mahasiswa' => $data->total,
            ]);
        }



        return view('admin.dashboard',  compact(
            'totalUsers',
            'totalUsersAndMembers',
            'totalAcceptedInternships',
            'totalRejectedInternships',
            'userGenderCounts',
            'anggotaGenderCounts',
            'documentSubmittedCount',
            'onReviewCount',
            'acceptedCount',
            'rejectedCount',
            'usersBySatuanKerja',
            'lineChartData',
        ));
    }
}
