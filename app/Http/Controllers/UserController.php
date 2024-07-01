<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Magang;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $jumlahAnggota = 0;

        $users = User::all();
        return view('admin.users.index', compact('users', 'jumlahAnggota'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->provinsi = $request->provinsi;
        $user->kabupaten = $request->kabupaten;
        $user->kecamatan = $request->kecamatan;
        $user->desa = $request->desa;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->agama = $request->agama;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->nama_sekolah = $request->nama_sekolah;
        $user->pendidikan = $request->pendidikan;
        $user->jurusan = $request->jurusan;
        $user->type = $request->type;
        $user->nomor_induk = $request->nomor_induk;
        $user->no_hp = $request->no_hp;
        $user->status = 'Tidak Aktif';
        $user->email = $request->email;
        $user->link_profile_linkedin = $request->link_profile_linkedin;
        $user->link_profile_instagram = $request->link_profile_instagram;
        $user->password = Hash::make($request->password);

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $request->name . '_' . $request->nomor_induk . '_fotoProfil.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images/users', $imageName);
            $user->foto = $imageName;
        }

        // Handle upload sertifikat_kelulusan
        if ($request->hasFile('sertifikat_kelulusan')) {
            $pdf = $request->file('sertifikat_kelulusan');
            $pdfName = $request->name . '_' . $request->nomor_induk . '_sertifikat.' . $pdf->getClientOriginalExtension();
            $path = $pdf->storeAs('public/pdf/sertifikat_kelulusan', $pdfName);
            $user->sertifikat_kelulusan = $pdfName;
        }


        // Handle upload cv
        if ($request->hasFile('cv')) {
            $pdf = $request->file('cv');
            $pdfName = $request->name . '_' . $request->nomor_induk . '_cv.' . $pdf->getClientOriginalExtension();
            $path = $pdf->storeAs('public/pdf/cv', $pdfName);
            $user->cv = $pdfName;
        }

        $user->save();


        // Redirect ke halaman index user dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User ' . $user->name . ' berhasil ditambahkan.');
    }


    public function magangs()
    {
        return $this->hasMany(Magang::class, 'user_id');
    }


    public function show($encryptedId)
    {
        $user = User::findByEncryptedId($encryptedId);
        return view('admin.users.show', compact('user'));
    }

    public function edit($encryptedId)
    {
        $user = User::findByEncryptedId($encryptedId);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $encryptedId)
    {
        $user = User::findByEncryptedId($encryptedId);

        if ($user) {
            $user->provinsi = $request->provinsi ?: $request->original_provinsi;
            $user->kabupaten = $request->kabupaten ?: $request->original_kabupaten;
            $user->kecamatan = $request->kecamatan ?: $request->original_kecamatan;
            $user->desa = $request->desa ?: $request->original_desa;

            $user->name = $request->name;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->agama = $request->agama;
            $user->type = $request->type;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->nama_sekolah = $request->nama_sekolah;
            $user->pendidikan = $request->pendidikan;
            $user->jurusan = $request->jurusan;
            $user->nomor_induk = $request->nomor_induk;
            $user->no_hp = $request->no_hp;
            $user->status = $request->status;
            $user->email = $request->email;
            $user->link_profile_linkedin = $request->link_profile_linkedin;
            $user->link_profile_instagram = $request->link_profile_instagram;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            // Handle upload foto
            if ($request->hasFile('foto')) {
                // Hapus gambar lama
                if ($user->foto) {
                    Storage::delete('public/images/users/' . $user->foto);
                }

                $image = $request->file('foto');
                $imageName = $request->name . '_' . $request->nomor_induk . '_fotoProfil.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/images/users', $imageName);
                $user->foto = $imageName;
            }

            // Handle upload sertifikat_kelulusan
            if ($request->hasFile('sertifikat_kelulusan')) {
                // Hapus PDF lama
                if ($user->sertifikat_kelulusan) {
                    Storage::delete('public/pdf/sertifikat_kelulusan/' . $user->sertifikat_kelulusan);
                }

                $pdf = $request->file('sertifikat_kelulusan');
                $pdfName = $request->name . '_' . $request->nomor_induk . '_sertifikat.' . $pdf->getClientOriginalExtension();
                $path = $pdf->storeAs('public/pdf/sertifikat_kelulusan', $pdfName);
                $user->sertifikat_kelulusan = $pdfName;
            }

            // Handle upload cv
            if ($request->hasFile('cv')) {
                // Hapus PDF lama
                if ($user->cv) {
                    Storage::delete('public/pdf/cv/' . $user->cv);
                }

                $pdf = $request->file('cv');
                $pdfName = $request->name . '_' . $request->nomor_induk . '_cv.' . $pdf->getClientOriginalExtension();
                $path = $pdf->storeAs('public/pdf/cv', $pdfName);
                $user->cv = $pdfName;
            }

            $user->save();

            // Redirect ke halaman index user dengan pesan sukses
            return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
        } else {
            return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
        }
    }

    public function destroy($encryptedId)
    {
        $user = User::findByEncryptedId($encryptedId);

        // Hapus gambar terkait jika ada
        if ($user->foto) {
            Storage::delete('public/images/users/' . $user->foto);
        }

        // Hapus sertifikat kelulusan terkait jika ada
        if ($user->sertifikat_kelulusan) {
            Storage::delete('public/pdf/sertifikat_kelulusan/' . $user->sertifikat_kelulusan);
        }

        // Hapus cv terkait jika ada
        if ($user->cv) {
            Storage::delete('public/pdf/cv/' . $user->cv);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }

    public function getUsersByProvince()
    {
        $provincesData = User::select('provinsi', DB::raw('count(*) as total'))
            ->groupBy('provinsi')
            ->get()
            ->toArray();

        return response()->json($provincesData);
    }
}
