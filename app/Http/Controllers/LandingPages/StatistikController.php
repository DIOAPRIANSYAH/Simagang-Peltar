<?php

namespace App\Http\Controllers\LandingPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Satker;

class StatistikController extends Controller
{
    public function index()
    {
        $satkers = Satker::all();
        $jumlahAnggota = 0;

        return view('landing-page.statistik', compact('satkers', 'jumlahAnggota'));
    }
}
