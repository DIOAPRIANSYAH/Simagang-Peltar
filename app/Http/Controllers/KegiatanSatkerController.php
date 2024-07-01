<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanSatker;
use App\Models\Satker;
use Illuminate\Support\Facades\Storage;

class KegiatanSatkerController extends Controller
{
    public function index()
    {
        $kegiatanSatker = KegiatanSatker::all();
        return view('admin.kegiatan_satker.index', compact('kegiatanSatker'));
    }

    public function create()
    {
        $satkers = Satker::all();
        return view('admin.kegiatan_satker.create', compact('satkers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_satker' => 'required',
            'judul_kegiatan' => 'required',
            'deskripsi' => 'nullable',
            'fotoKegiatan' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // validasi gambar
        ]);

        $kegiatanSatker = new KegiatanSatker();
        $kegiatanSatker->id_satker = $request->id_satker;
        $kegiatanSatker->judul_kegiatan = $request->judul_kegiatan;
        $kegiatanSatker->deskripsi = $request->deskripsi;

        // Handle upload gambar
        if ($request->hasFile('fotoKegiatan')) {
            $image = $request->file('fotoKegiatan');
            $imageName = $request->judul_kegiatan . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/imageskegiatan_satker', $imageName); // menyimpan gambar ke dalam direktori storage
            $kegiatanSatker->fotoKegiatan = $imageName;
        }

        $kegiatanSatker->save();

        return redirect()->route('kegiatan_satker.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }


    public function show($encryptedId)
    {
        $kegiatanSatker = KegiatanSatker::findByEncryptedId($encryptedId);
        return view('admin.kegiatan_satker.show', compact('kegiatanSatker'));
    }

    public function edit($encryptedId)
    {
        $kegiatan = KegiatanSatker::findByEncryptedId($encryptedId);
        $satkers = Satker::all();

        return view('admin.kegiatan_satker.edit', compact('kegiatan', 'satkers'));
    }

    public function update(Request $request, $encryptedId)
    {
        $request->validate([
            'id_satker' => 'required',
            'judul_kegiatan' => 'required',
            'deskripsi' => 'nullable',
            'fotoKegiatan' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // jika diperlukan validasi gambar
        ]);

        $kegiatan = KegiatanSatker::findByEncryptedId($encryptedId);

        // Update data kegiatan
        $kegiatan->id_satker = $request->id_satker;
        $kegiatan->judul_kegiatan = $request->judul_kegiatan;
        $kegiatan->deskripsi = $request->deskripsi;

        // Jika ada gambar yang diunggah, simpan ke penyimpanan dan perbarui nama file di database
        if ($request->hasFile('fotoKegiatan')) {
            $imagePath = $request->file('fotoKegiatan')->store('public/images/kegiatan_satker');
            $kegiatan->fotoKegiatan = basename($imagePath);
        }

        $kegiatan->save();

        return redirect()->route('kegiatan_satker.index')->with('success', 'Data kegiatan berhasil diperbarui.');
    }

    public function destroy($encryptedId)
    {
        $kegiatanSatker = KegiatanSatker::findByEncryptedId($encryptedId);

        // Hapus gambar terkait jika ada
        if ($kegiatanSatker->fotoKegiatan) {
            // Menghapus file gambar dari penyimpanan
            Storage::delete('public/images/kegiatan_satker/' . $kegiatanSatker->fotoKegiatan);
        }

        // Hapus data kegiatan dari database
        $kegiatanSatker->delete();

        return redirect()->route('kegiatan_satker.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
