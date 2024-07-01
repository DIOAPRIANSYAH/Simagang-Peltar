<?php

namespace App\Http\Controllers\LandingPages;

use App\Http\Controllers\Controller;
use App\Models\Satker;
use Illuminate\Http\Request;
use App\Models\KegiatanSatker;

class SatkersController extends Controller
{
    public function index()
    {
        $jumlahAnggota = 0;
        $satkers = Satker::all();
        $kegiatan_satker = KegiatanSatker::all();
        return view('landing-page.satker', compact('satkers', 'kegiatan_satker', 'jumlahAnggota'));
    }
}
