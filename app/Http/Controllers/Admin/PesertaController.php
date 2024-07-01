<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Magang;
use App\Models\Satker;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Anggota;

class PesertaController extends Controller
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

        return view('admin.peserta.index', compact('magang', 'satkers'));
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

        return view('admin.peserta.show', compact('magang', 'user', 'anggota'));
    }
}
