<?php

namespace App\Http\Controllers\Pendaftar;

use App\Http\Controllers\Controller;
use App\Models\Satker;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satkers = Satker::all();

        $authUserId = Auth::id();
        $testimonial = Testimonial::where('id_users', $authUserId)->latest()->first();
        return view('pendaftar.testimonial.index', compact('testimonial', 'satkers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satkers = Satker::all();

        $users = User::all();
        return view('pendaftar.testimonial.create', compact('users', 'satkers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Menggunakan $request->all() untuk mendapatkan semua input
        $data = $request->all();
        $data['id_users'] = Auth::id(); // Menetapkan id_users dari pengguna yang terautentikasi

        // Membuat instance Testimonial dan menyimpan data
        $testimonial = Testimonial::create($data);


        // Jika berhasil disimpan, redirect ke halaman index
        return redirect()->route('testimonial.pendaftar.index')->with('success', 'Testimonial berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     *
     * @param  string  $encryptedId
     * @return \Illuminate\Http\Response
     */
    public function show($encryptedId)
    {
        $users = User::all();

        $testimonial = Testimonial::findByEncryptedId($encryptedId);
        return view('admin.testimonial.show', compact('testimonial', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $encryptedId
     * @return \Illuminate\Http\Response
     */
    public function edit($encryptedId)
    {
        $testimonial = Testimonial::findByEncryptedId($encryptedId);
        $users = User::all(); // Ambil semua data user
        return view('admin.testimonial.edit', compact('testimonial', 'users'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $encryptedId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $encryptedId)
    {
        $testimonial = Testimonial::findByEncryptedId($encryptedId);

        if (!$testimonial) {
            return redirect()->route('testimonial.index')->with('error', 'Testimonial tidak ditemukan.');
        }

        $validatedData = $request->validate([
            'id_users' => 'required|exists:users,id',
            'rate' => 'required|integer|between:1,5',
            'keterangan' => 'required|string',
        ]);

        $testimonial->update($validatedData);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $encryptedId
     * @return \Illuminate\Http\Response
     */
    public function destroy($encryptedId)
    {
        $testimonial = Testimonial::findByEncryptedId($encryptedId);

        if (!$testimonial) {
            return redirect()->route('testimonial.index')->with('error', 'Testimonial tidak ditemukan.');
        }

        $testimonial->delete();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil dihapus.');
    }
}
