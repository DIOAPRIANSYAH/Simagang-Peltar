<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendApprovalEmail;
use Illuminate\Support\Facades\Crypt;
use App\Models\Magang;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovalEmail; // Pastikan impor ini ada
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;


class AnggotaController extends Controller
{
    public function index()
    {
        // Ambil semua anggota (contoh)
        $pendaftars = Anggota::all(); // Ganti dengan query yang sesuai dengan kebutuhan Anda

        // Melewatkan variabel $pendaftars ke view
        return view('anggota.index', compact('pendaftars'));
    }

    // Di dalam controller
    public function showRegistrationForm()
    {
        // Mendapatkan tahun sekarang
        $currentYear = Carbon::now()->year;

        // Mengambil data pendaftar dari tahun ini
        $pendaftars = Magang::with('user')
            ->whereYear('created_at', $currentYear)
            ->get();

        return view('auth.register_anggota', compact('pendaftars'));
    }

    public function store(Request $request)
    {
        // Get the id_users from the request
        $id_users = $request->id_users;

        // Find the magang entry based on id_users
        $magang = Magang::where('id_users', $id_users)->first();

        // Check if magang entry exists
        if (!$magang) {
            return redirect()->back()->with('error', 'Nama pendaftar yang dipilih tidak valid.');
        }

        // Get the user associated with the id_users
        $pendaftar = User::find($magang->id_users);

        if (!$pendaftar) {
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan.');
        }

        // Check if the pendaftar already has more than 2 anggota
        $anggotaCount = Anggota::where('id_users', $magang->id_users)->count();
        if ($anggotaCount >= 2) {
            return redirect()->back()->with('sweet_error', 'Pendaftar sudah memiliki anggota dengan jumlah maksimal.');
        }

        // Check if email already exists
        $existingEmail = Anggota::where('email', $request->email)->first();
        if ($existingEmail) {
            return redirect()->back()->with('sweet_error', 'Email sudah terdaftar.');
        }

        // Create a new Anggota instance
        $anggota = new Anggota();

        // Set the attributes
        $anggota->nama = $request->nama;
        $anggota->email = $request->email;
        $anggota->type = 3;

        // Hash the password if provided
        if ($request->filled('password')) {
            $anggota->password = Hash::make($request->password);
        }

        // Set id_users and id_magang from the magang
        $anggota->id_users = $magang->id_users;
        $anggota->id_magang = $magang->id; // Assuming id is the primary key of magang table

        // Generate a verification token
        $anggota->verification_token = Str::random(32);
        $anggota->is_verified = false;

        // Save the anggota to the database
        $anggota->save();

        // Send email for validation to the pendaftar/ketua
        SendApprovalEmail::dispatch($anggota, $pendaftar);

        // Show SweetAlert after saving and sending email
        return redirect()->route('register.anggota')->with('sweet_success', 'Silakan Hubungi Ketua Magang Anda Untuk Proses Verifikasi.');
    }

    public function magangs()
    {
        return $this->hasMany(Magang::class, 'user_id');
    }

    public function validateEmail($token)
    {
        $anggota = Anggota::where('verification_token', $token)->firstOrFail();

        $anggota->is_verified = true;
        $anggota->verification_token = null;
        $anggota->save();

        return redirect()->route('login')->with('success', 'Email Anda telah divalidasi. Silakan login.');
    }

    public function destroy($encryptedId)
    {
        $anggota = Anggota::findByEncryptedId($encryptedId);

        // Hapus gambar terkait jika ada
        if ($anggota->foto) {
            Storage::delete('public/images/anggota/' . $anggota->foto);
        }

        // Hapus sertifikat kelulusan terkait jika ada
        if ($anggota->sertifikat_kelulusan) {
            Storage::delete('public/pdf/sertifikat_kelulusan/' . $anggota->sertifikat_kelulusan);
        }

        // Hapus cv terkait jika ada
        if ($anggota->cv) {
            Storage::delete('public/pdf/cv/' . $anggota->cv);
        }

        $anggota->delete();

        // Simpan encryptedId ke sesi dan redirect ke halaman login dengan pesan SweetAlert
        return redirect()->route('login')->with([
            'sweet_success' => 'Anggota berhasil direject dan dihapus dari database.',
            'encryptedId' => $encryptedId
        ]);
    }
}
