<?php

namespace App\Http\Controllers\LandingPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Satker;
use App\Models\Testimonial;

class TentangKamiController extends Controller
{
    public function index()
    {
        $satkers = Satker::all();
        $jumlahAnggota = 0;
        $testimonials = Testimonial::all();
        return view('landing-page.tentang-kami', compact('satkers', 'jumlahAnggota', 'testimonials'));
    }
}
