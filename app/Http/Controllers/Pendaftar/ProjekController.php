<?php

namespace App\Http\Controllers\Pendaftar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projek;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\Satker;

class ProjekController extends Controller
{
    public function index()
    {
        $projeks = Projek::all();
        return view('projek.index', compact('projeks'));
    }

    public function create()
    {
        $satkers = Satker::all();

        return view('pendaftar.projek.create', compact('satkers'));
    }

    public function store(Request $request)
    {
        $projek = new Projek();

        $projek->id_magang = $request->id_magang;
        $projek->judul = $request->judul;
        $projek->jenis = $request->jenis;
        $projek->status = $request->status;
        $projek->link_github = $request->link_github;

        // Handle upload foto
        if ($request->hasFile('dokumentasi_pengerjaan1')) {
            $image = $request->file('dokumentasi_pengerjaan1');
            $imageName = $request->judul . '_' . $request->nomor_induk . '_Dokumentasi' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images/projek', $imageName);
            $projek->dokumentasi_pengerjaan1 = $imageName;
        }
        if ($request->hasFile('dokumentasi_pengerjaan2')) {
            $image = $request->file('dokumentasi_pengerjaan2');
            $imageName = $request->judul . '_' . $request->nomor_induk . '_Dokumentasi' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images/projek', $imageName);
            $projek->dokumentasi_pengerjaan2 = $imageName;
        }
        if ($request->hasFile('dokumentasi_pengerjaan3')) {
            $image = $request->file('dokumentasi_pengerjaan3');
            $imageName = $request->judul . '_' . $request->nomor_induk . '_Dokumentasi' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images/projek', $imageName);
            $projek->dokumentasi_pengerjaan3 = $imageName;
        }



        // if ($request->hasFile('dokumentasi_pengerjaan2')) {
        //     $dokumentasi2 = $request->file('dokumentasi_pengerjaan2')->store('public/dokumentasi');
        //     $projek->dokumentasi_pengerjaan2 = $dokumentasi2;
        // }

        // if ($request->hasFile('dokumentasi_pengerjaan3')) {
        //     $dokumentasi3 = $request->file('dokumentasi_pengerjaan3')->store('public/dokumentasi');
        //     $projek->dokumentasi_pengerjaan3 = $dokumentasi3;
        // }

        $projek->save();

        return redirect()->route('projek.index')->with('success', 'Projek berhasil dibuat.');
    }

    public function edit($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $projek = Projek::findOrFail($id);
        return view('projek.edit', compact('projek'));
    }

    public function update(Request $request, $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $projek = Projek::findOrFail($id);

        $projek->id_magang = $request->id_magang;
        $projek->judul = $request->judul;
        $projek->jenis = $request->jenis;
        $projek->status = $request->status;
        $projek->link_github = $request->link_github;

        // Handle upload dokumentasi
        if ($request->hasFile('dokumentasi_pengerjaan1')) {
            // Hapus gambar lama
            if ($projek->dokumentasi_pengerjaan1) {
                Storage::delete('public/images/projek/' . $projek->dokumentasi_pengerjaan1);
            }

            $image = $request->file('dokumentasi_pengerjaan1');
            $imageName = $request->judul . '_' . $request->nomor_induk . '_dokumentasi_pengerjaan1.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images/projek', $imageName);
            $projek->dokumentasi_pengerjaan1 = $imageName;
        }

        if ($request->hasFile('dokumentasi_pengerjaan2')) {
            // Hapus gambar lama
            if ($projek->dokumentasi_pengerjaan2) {
                Storage::delete('public/images/projek/' . $projek->dokumentasi_pengerjaan2);
            }

            $image = $request->file('dokumentasi_pengerjaan2');
            $imageName = $request->judul . '_' . $request->nomor_induk . '_dokumentasi_pengerjaan2.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images/projek', $imageName);
            $projek->dokumentasi_pengerjaan2 = $imageName;
        }

        if ($request->hasFile('dokumentasi_pengerjaan3')) {
            // Hapus gambar lama
            if ($projek->dokumentasi_pengerjaan3) {
                Storage::delete('public/images/projek/' . $projek->dokumentasi_pengerjaan3);
            }

            $image = $request->file('dokumentasi_pengerjaan3');
            $imageName = $request->judul . '_' . $request->nomor_induk . '_dokumentasi_pengerjaan3.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images/projek', $imageName);
            $projek->dokumentasi_pengerjaan3 = $imageName;
        }

        // // Handle upload dokumentasi
        // if ($request->hasFile('dokumentasi_pengerjaan1')) {
        //     $dokumentasi1 = $request->file('dokumentasi_pengerjaan1')->store('public/dokumentasi');
        //     $projek->dokumentasi_pengerjaan1 = $dokumentasi1;
        // }

        // if ($request->hasFile('dokumentasi_pengerjaan2')) {
        //     $dokumentasi2 = $request->file('dokumentasi_pengerjaan2')->store('public/dokumentasi');
        //     $projek->dokumentasi_pengerjaan2 = $dokumentasi2;
        // }

        // if ($request->hasFile('dokumentasi_pengerjaan3')) {
        //     $dokumentasi3 = $request->file('dokumentasi_pengerjaan3')->store('public/dokumentasi');
        //     $projek->dokumentasi_pengerjaan3 = $dokumentasi3;
        // }

        $projek->save();

        return redirect()->route('projek.index')->with('success', 'Projek berhasil diperbarui.');
    }

    public function destroy($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $projek = Projek::findOrFail($id);

        if ($projek->dokumentasi_pengerjaan1) {
            Storage::delete('public/images/projek/' . $projek->dokumentasi_pengerjaan1);
        }
        if ($projek->dokumentasi_pengerjaan2) {
            Storage::delete('public/images/projek/' . $projek->dokumentasi_pengerjaan2);
        }
        if ($projek->dokumentasi_pengerjaan3) {
            Storage::delete('public/images/projek/' . $projek->dokumentasi_pengerjaan3);
        }


        $projek->delete();

        return redirect()->route('projek.index')->with('success', 'Projek berhasil dihapus.');
    }
}
