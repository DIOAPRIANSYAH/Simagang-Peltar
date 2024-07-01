<?php

use App\Http\Controller\Admin\MapsController as AdminMapsController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GagalSeleksiController;
use App\Http\Controllers\Admin\PendaftaranController as AdminPendaftaranController;
use App\Http\Controllers\Pendaftar\AnggotaController as PendaftarAnggotaController;
use App\Http\Controllers\Pendaftar\MonitoringController as PendaftarMonitoringController;
use App\Http\Controllers\Pendaftar\PendaftaranController as PendaftarPendaftaranController;
use App\Http\Controllers\Pendaftar\ProfileController as PendaftarProfileController;
use App\Http\Controllers\Pendaftar\ProjekController as PendaftarProjekController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SatkerController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KegiatanSatkerController;
use App\Http\Controllers\KualifikasiController;
use App\Http\Controllers\LandingPages\BerandaController;
use App\Http\Controllers\LandingPages\SatkersController;
use App\Http\Controllers\LandingPages\HubungiKamiController;
use App\Http\Controllers\LandingPages\StatistikController;
use App\Http\Controllers\LandingPages\TentangKamiController;

use App\Http\Controllers\Anggota\BerandaController as AnggotaBerandaController;
use App\Http\Controllers\Anggota\SatkersController as AnggotaSatkersController;
use App\Http\Controllers\Anggota\HubungiKamiController as AnggotaHubungiKamiController;
use App\Http\Controllers\Anggota\StatistikController as AnggotaStatistikController;
use App\Http\Controllers\Anggota\TentangKamiController as AnggotaTentangKamiController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AnggotaAuthController;
use App\Http\Controllers\Admin\LolosSeleksiController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Anggota\AnggotaController;
use App\Http\Controllers\Anggota\MonitoringController as AnggotaMonitoringController;
use App\Http\Controllers\Anggota\ProfileController as AnggotaProfileController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LinkedinController;
use App\Http\Controllers\Admin\MapsController;
use App\Http\Controllers\Admin\PenilaianMagangController;
use Illuminate\Support\Facades\Mail;

Auth::routes();

// routes/web.php
Route::get('/login-anggota', [AnggotaAuthController::class, 'showLoginForm'])->name('anggota.login');
Route::post('/login-anggota', [AnggotaAuthController::class, 'login'])->name('anggota.login.submit');

Route::middleware(['auth:anggota'])->group(function () {
    Route::post('/anggota/logout', [LoginController::class, 'logout'])->name('anggota.logout');
    Route::get('/anggota/dashboard', [HomeController::class, 'anggota'])->name('anggota.dashboard');
    Route::get('/anggota/monitoring', [AnggotaMonitoringController::class, 'index'])->name('anggota.monitoring.index');
    Route::get('/anggota/profile/edit/{encryptedId}', [AnggotaProfileController::class, 'edit'])->name('anggota.profile.edit');
    Route::put('/anggota/profile/update/{encryptedId}', [AnggotaProfileController::class, 'update'])->name('anggota.profile.update');
    Route::get('anggota/monitoring', [PendaftarMonitoringController::class, 'anggota'])->name('monitoring.anggota');

    Route::get('anggota/beranda', [AnggotaBerandaController::class, 'index'])->name('anggota.beranda');
    Route::get('anggota/satker', [AnggotaSatkersController::class, 'index'])->name('anggota.satker');
    Route::get('anggota/statistik', [AnggotaStatistikController::class, 'index'])->name('anggota.statistik');
    Route::get('anggota/tentangKami', [AnggotaTentangKamiController::class, 'index'])->name('anggota.tentangKami');
    Route::get('anggota/hubungiKami', [AnggotaHubungiKamiController::class, 'index'])->name('anggota.hubungiKami');
    Route::post('anggota/send-message', [AnggotaHubungiKamiController::class, 'sendMessage'])->name('anggota.send.message');
});



//Pendaftar Users Routes List
Route::middleware(['auth', 'user-access:pendaftar'])->group(function () {
    Route::post('/pendaftar/logout', [LoginController::class, 'logout'])->name('pendaftar.logout');
    Route::get('/pendaftar/landingPage', [HomeController::class, 'index'])->name('pendaftar.landingPage');
    Route::resource('/pendaftar/profile', PendaftarProfileController::class);
    Route::resource('/pendaftar/pendaftaran', PendaftarPendaftaranController::class);
    Route::resource('/pendaftar/anggota', PendaftarAnggotaController::class);
    Route::resource('/pendaftar/monitoring', PendaftarMonitoringController::class);
    Route::resource('/pendaftar/projek', PendaftarProjekController::class);
});


//PIC SATKER Routes List
Route::middleware(['auth', 'user-access:pic_satker'])->group(function () {
    Route::get('/pic_satker/dashboard', [HomeController::class, 'pic_satker'])->name('pic_satker.dashboard');
    Route::post('/pic_satker/logout', [LoginController::class, 'logout'])->name('pic_satker.logout');
});


//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/adminn/dashboard', [HomeController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // Route untuk mendapatkan data provinsi
    Route::get('/provinsi-data', [AdminMapsController::class, 'getProvinsiData'])->name('provinsi.data');
    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::resource('/admin/satker', SatkerController::class);
    Route::resource('/admin/kegiatan_satker', KegiatanSatkerController::class);
    Route::resource('/admin/kualifikasi', KualifikasiController::class);
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/magang', AdminPendaftaranController::class);
    Route::resource('/admin/lolos-seleksi', LolosSeleksiController::class);
    Route::resource('/admin/gagal-seleksi', GagalSeleksiController::class);
    Route::resource('/admin/peserta', PesertaController::class);
    Route::resource('/admin/penilaian-magang', PenilaianMagangController::class);
    Route::resource('/admin/faq', FaqController::class);
    Route::resource('/admin/testimonial', TestimonialController::class);
    Route::get('magang/{encryptedId}/export-pdf', [AdminPendaftaranController::class, 'exportPdf'])->name('cetak.surat');
});

// Landing-Page
Route::get('/', [BerandaController::class, 'index']);
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/satker', [SatkersController::class, 'index'])->name('satker');
Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik');
Route::get('/tentangKami', [TentangKamiController::class, 'index'])->name('tentangKami');
Route::get('/hubungiKami', [HubungiKamiController::class, 'index'])->name('hubungiKami');
Route::post('/send-message', [HubungiKamiController::class, 'sendMessage'])->name('send.message');


Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::controller(GithubController::class)->group(function () {
    Route::get('auth/github', 'redirectToGithub')->name('auth.github');
    Route::get('auth/github/callback', 'handleGithubCallback');
});

//login fb
Route::controller(FacebookController::class)->group(function () {
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

//login linkedin
Route::controller(LinkedinController::class)->group(function () {
    Route::get('auth/linkedin', 'redirectToLinkedin')->name('auth.linkedin');
    Route::get('auth/linkedin/callback', 'handleLinkedinCallback');
});



// Route untuk menampilkan form pendaftaran anggota
Route::get('/register/anggota', [AnggotaController::class, 'showRegistrationForm'])->name('register.anggota');

// Route untuk menyimpan data anggota setelah pendaftaran
Route::post('/register/anggota/submit', [AnggotaController::class, 'store'])->name('register.submit');

// Tambahan route untuk validasi email (jika diperlukan)
Route::get('/validate-email/{encryptedId}', [AnggotaController::class, 'validateEmail'])->name('validate.email');
// Route::get('/approve-email', [ApprovalController::class, 'approveEmail'])->name('approve.email');
Route::post('/send-approval-email', [EmailController::class, 'sendApprovalEmail'])->name('send.approval.email');
Route::get('approve-email/{token}', [AnggotaController::class, 'validateEmail'])->name('approve.email');
Route::delete('/anggota/register/{encryptedId}/destroy', [AnggotaController::class, 'destroy'])->name('anggota.register.destroy');
