<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kualifikasi;
use App\Models\Satker;

class KualifikasiController extends Controller
{
    public function index()
    {
        $kualifikasi = Kualifikasi::all();
        return view('admin.kualifikasi.index', compact('kualifikasi'));
    }

    public function show($encryptedId)
    {
        $kualifikasi = Kualifikasi::findByEncryptedId($encryptedId);
        return view('admin.kualifikasi.show', compact('kualifikasi'));
    }


    public function create()
    {
        $satkers = Satker::all();
        return view('admin.kualifikasi.create', compact('satkers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_satker' => 'required',
            'gender' => 'required',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'perangkat' => 'required',
            'penempatan' => 'required',
            'durasi' => 'required',
            'kompetensi' => 'required',
        ]);

        Kualifikasi::create($request->all());

        return redirect()->route('kualifikasi.create')->with('success', 'Data kualifikasi berhasil ditambahkan.');
    }

    public function edit($encryptedId)
    {
        $kualifikasi = Kualifikasi::findByEncryptedId($encryptedId);
        $satkers = Satker::all();
        return view('admin.kualifikasi.edit', compact('kualifikasi', 'satkers'));
    }

    public function update(Request $request, $encryptedId)
    {
        $kualifikasi = Kualifikasi::findByEncryptedId($encryptedId);

        $request->validate([
            'id_satker' => 'required',
            'gender' => 'required',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'perangkat' => 'required',
            'penempatan' => 'required',
            'durasi' => 'required',
            'kompetensi' => 'required',
        ]);

        $kualifikasi->update($request->all());

        return redirect()->route('kualifikasi.index')->with('success', 'Data kualifikasi berhasil diperbarui.');
    }

    public function destroy($encryptedId)
    {
        $kualifikasi = Kualifikasi::findByEncryptedId($encryptedId);
        $kualifikasi->delete();

        return redirect()->route('kualifikasi.index')->with('success', 'Data kualifikasi berhasil dihapus.');
    }
}
