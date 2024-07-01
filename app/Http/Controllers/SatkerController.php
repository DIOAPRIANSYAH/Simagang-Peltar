<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satker;
use Illuminate\Support\Facades\Storage;

class SatkerController extends Controller
{
    /**
     * Menampilkan daftar semua satker.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satkers = Satker::all();
        return view('admin.satker.index', compact('satkers'));
    }

    /**
     * Menampilkan formulir untuk membuat satker baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.satker.create');
    }

    /**
     * Menyimpan satker yang baru dibuat ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $satker = new Satker();
        $validatedData = $request->validate([
            'nama_satker' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $satker->nama_satker . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/images/satker', $imageName);
            $validatedData['foto'] = $imageName;
        }

        $satker = Satker::create($validatedData);

        return redirect()->route('satker.index')->with('success', 'Satker ' . $satker->nama_satker . ' berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satker.
     *
     * @param  int  $encryptedId
     * @return \Illuminate\Http\Response
     */
    public function show($encryptedId)
    {
        $satker = Satker::findByEncryptedId($encryptedId);
        return view('admin.satker.show', compact('satker'));
    }

    public function edit($encryptedId)
    {
        $satker = Satker::findByEncryptedId($encryptedId);
        return view('admin.satker.edit', compact('satker'));
    }

    public function update(Request $request, $encryptedId)
    {
        $satker = Satker::findByEncryptedId($encryptedId);

        $request->validate([
            'nama_satker' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus gambar lama
            if ($satker->foto) {
                Storage::delete('public/images/satker/' . $satker->foto);
            }

            $image = $request->file('foto');
            $imageName = $satker->nama_satker . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/images/satker', $imageName);
            $request->merge(['foto' => $imageName]);
        }

        $satker->update($request->all());

        return redirect()->route('satker.index')->with('success', 'Satker berhasil diperbarui.');
    }

    /**
     * Menghapus satker dari database.
     *
     * @param  int  $encryptedId
     * @return \Illuminate\Http\Response
     */
    public function destroy($encryptedId)
    {
        $satker = Satker::findByEncryptedId($encryptedId);

        // Hapus gambar terkait jika ada
        if ($satker->foto) {
            Storage::delete('public/images/satker/' . $satker->foto);
        }

        $satker->delete();

        return redirect()->route('satker.index')->with('success', 'Satker berhasil dihapus.');
    }
}
