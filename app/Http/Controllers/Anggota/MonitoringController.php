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

        // Ambil data Magang berdasarkan id_user auth
        $magang = Magang::where('id_users', Auth::user()->id_users)->first();
        $statusCount = Magang::where('status', '!=', 'Document Submitted')->where('id_users', Auth::user()->id_users)->count();
        // Kirim data Magang ke view
        return view('anggota.monitoring.index', compact('magang', 'satkers', 'statusCount'));
    }
}
