<?php

namespace App\Http\Controllers\Pendaftar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Satker;
use App\Models\Magang;
use Illuminate\Support\Facades\Auth;

class MonitoringController extends Controller
{
    public function index()
    {
        $satkers = Satker::all();

        // Ambil data Magang berdasarkan id_user auth
        $magang = Magang::where('id_users', Auth::id())->first();
        $statusCount = Magang::where('status', '!=', 'Document Submitted')->where('id_users', Auth::id())->count();

        // Kirim data Magang ke view
        return view('pendaftar.monitoring.index', compact('magang', 'satkers', 'statusCount'));
    }
}
