<?php
// app/Http/Controllers/MapController.php

namespace App\Http\Controller\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapsController extends Controller
{
    public function getDataProvinsi()
    {
        // Mengambil data provinsi dari tabel users dan anggotas
        $userProvinsiCounts = User::select('provinsi', DB::raw('count(*) as total'))
            ->groupBy('provinsi')
            ->pluck('total', 'provinsi')
            ->toArray();

        $anggotaProvinsiCounts = Anggota::select('provinsi', DB::raw('count(*) as total'))
            ->groupBy('provinsi')
            ->pluck('total', 'provinsi')
            ->toArray();

        // Menggabungkan data
        $combinedData = [];
        foreach ($userProvinsiCounts as $provinsi => $total) {
            $combinedData[$provinsi] = $total;
        }

        foreach ($anggotaProvinsiCounts as $provinsi => $total) {
            if (isset($combinedData[$provinsi])) {
                $combinedData[$provinsi] += $total;
            } else {
                $combinedData[$provinsi] = $total;
            }
        }

        // Mengirim data sebagai JSON
        return response()->json($combinedData);
    }
}
