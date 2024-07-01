<?php

namespace App\Http\Controllers\LandingPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Satker;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use App\Models\Magang;

class BerandaController extends Controller
{
    public function index()
    {
        $satkers = Satker::all();
        $jumlahAnggota =  0;
        $statusCount = Magang::where('status', '!=', 'Document Submitted')->where('id_users', Auth::id())->count();


        return view('landing-page.beranda', compact('satkers', 'jumlahAnggota', 'statusCount'));
    }
}
