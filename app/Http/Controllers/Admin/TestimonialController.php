<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.testimonial.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_users' => 'required|exists:users,id',
            'rate' => 'required|integer|between:1,5',
            'keterangan' => 'required|string',
        ]);

        $testimonial = Testimonial::create($validatedData);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $encryptedId
     * @return \Illuminate\Http\Response
     */
    public function show($encryptedId)
    {
        $testimonial = Testimonial::findByEncryptedId($encryptedId);
        return view('admin.testimonial.show', compact('testimonial'));
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
        return view('admin.testimonial.edit', compact('testimonial'));
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
