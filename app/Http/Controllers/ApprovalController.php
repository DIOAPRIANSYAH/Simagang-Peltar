<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function approveEmail(Request $request)
    {
        // Lakukan proses persetujuan email di sini
        // Misalnya, mengubah status anggota atau melakukan tindakan lain

        // Contoh: Ambil id anggota dari request
        $anggotaId = $request->input('anggota_id');

        // Contoh: Temukan anggota berdasarkan id
        $anggota = Anggota::findOrFail($anggotaId);

        // Contoh: Lakukan tindakan persetujuan, misalnya mengubah status
        $anggota->status = 'disetujui';
        $anggota->save();

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('anggota.index')->with('success', 'Email telah berhasil diverifikasi.');
    }
}
