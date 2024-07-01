<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Magang;
use App\Models\User;
use App\Models\Anggota;
use App\Models\PenilaianMagang;

class PenilaianMagangController extends Controller
{
    public function index()
    {
        $penilaianMagang = PenilaianMagang::with(['magang.ketua', 'magang.anggota.user'])->get();
        return view('admin.penilaian-magang.index', compact('penilaianMagang'));
    }

    public function show($encryptedId)
    {
        $magang = Magang::findByEncryptedId($encryptedId);
        $magang->load('user', 'projek');

        // Fetch all users that have a status of 'Accepted' in the magang table
        $user = User::whereIn('id', function ($query) {
            $query->select('id_users')
                ->from('magang')
                ->where('status', 'Accepted');
        })->get();

        // Fetch all magang records with the same id_users as the current user
        $anggota = Anggota::all();

        return view('admin.penilaian-magang.show', compact('magang', 'user', 'anggota'));
    }
}
