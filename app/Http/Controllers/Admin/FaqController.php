<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Menampilkan daftar semua FAQ.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Menampilkan formulir untuk membuat FAQ baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Menyimpan FAQ yang baru dibuat ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'keterangan' => 'nullable',
        ]);

        $faq = Faq::create($validatedData);

        return redirect()->route('faq.index')->with('success', 'FAQ ' . $faq->judul . ' berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail FAQ.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($encryptedId)
    {
        $faq = Faq::findByEncryptedId($encryptedId);
        return view('admin.faq.show', compact('faq'));
    }

    /**
     * Menampilkan formulir untuk mengedit FAQ.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($encryptedId)
    {
        $faq = Faq::findByEncryptedId($encryptedId);
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Memperbarui FAQ di dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $encryptedId)
    {
        $faq = Faq::findByEncryptedId($encryptedId);

        $request->validate([
            'judul' => 'required',
            'keterangan' => 'nullable',
        ]);

        $faq->update($request->all());

        return redirect()->route('faq.index')
            ->with('success', 'FAQ berhasil diperbarui.');
    }

    /**
     * Menghapus FAQ dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($encryptedId)
    {
        $faq = Faq::findByEncryptedId($encryptedId);
        $faq->delete();

        return redirect()->route('faq.index')
            ->with('success', 'FAQ berhasil dihapus.');
    }
}
