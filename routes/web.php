<?php

use App\Http\Controllers\BayarSPPController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DaftarPendaftarUjianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PasswordController;

Route::get('/', function () {
    return view('landing_page.beranda', [
        "title" => "Beranda",
        "active" => "beranda",
    ]);
});
Route::get('/program-tahfidz', function () {
    return view('landing_page.program_tahfidz', [
        "title" => "Program Tahfidz",
        "active" => "programtahfidz",
    ]);
});
Route::get('/rta-mart', function () {
    return view('landing_page.rta_mart', [
        "title" => "RTA Mart",
        "active" => "rtamart",
    ]);
});

Route::get('/galeri', function () {
    return view('landing_page.galeri', [
        "title" => "Galeri",
        "active" => "galeri",
    ]);
});
Route::get('/kontak', function () {
    return view('landing_page.kontak', [
        "title" => "kontak",
        "active" => "kontak",
    ]);
});

Route::get('/donasi', function () {
    return view('landing_page.donasi', [
        "title" => "Donasi",
        "active" => "kontak",
    ]);
});

Route::get('/daftar-reguler', function () {
return view('landing_page.daftar', [
        "title" => "Daftar Kelas Reguler",
        "program" => "Kelas Reguler",
        "deskripsi" => "Pertemuan untuk menghafal diadakan 2 kali dalam seminggu",
        "waktu" => "Senin - Jum'at",
    ]);
});
Route::get('/daftar-remaja', function () {
return view('landing_page.daftar', [
        "title" => "Daftar Kelas Remaja",
        "program" => "Kelas Remaja",
        "deskripsi" => "Untuk umur 17 - 25 tahun sampai dengan kuliah, Pertemuan 2x seminggu",
        "waktu" => "Senin - Kamis",
    ]);
});
Route::get('/daftar-anak', function () {
return view('landing_page.daftar', [
        "title" => "Daftar Kelas Anak-anak",
        "program" => "Kelas Anak-anak",
        "deskripsi" => "Kelas ini untuk anak jenjang pendididikan SD dan dilakukan 3x seminggu, terdapat dua kelas;
        Kelas 1- 3,
        Kelas 4 - 6",
        "waktu" => "Senin - Sabtu",
    ]);
});
Route::get('/daftar-pekerja', function () {
return view('landing_page.daftar', [
        "title" => "Daftar Kelas Pekerja",
        "program" => "Kelas Pekerja",
        "deskripsi" => "Dikhususkan untuk para ibu-ibu yang bekerja",
        "waktu" => "Sabtu",
    ]);
});
// Route::resource('/history', SiswaController::class)->middleware('auth');
Route::get('/layanan', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/layanan', [LoginController::class, 'authenticate']);
Route::get('/daftar-berhasil', [LoginController::class, 'daftarBerhasil']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/daftar', [LoginController::class, 'register']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/siswa', SiswaController::class);
Route::resource('/pendaftar', PendaftarController::class);
Route::resource('/guru', GuruController::class);

Route::resource('/kritiksaran', KritikSaranController::class);
Route::post('/kirim-kritiksaran', [KritikSaranController::class, 'kirim']);

Route::resource('/kelas', KelasController::class);
Route::post('/detail-kelas/create', [KelasController::class, 'tambahSiswa']);
Route::delete('/detail-kelas/{detail_siswa}', [KelasController::class, 'destroySiswa'])->name('detail_kelas.destroy');

Route::resource('/setoran', SetoranController::class);
Route::resource('/riwayat', RiwayatController::class);

Route::resource('/tagihan', TagihanController::class);
Route::resource('/pembayaran', PembayaranController::class);
Route::resource('/bayar-spp', BayarSPPController::class);
Route::resource('/donasi', DonasiController::class);

Route::resource('/buat-jadwal', JadwalController::class);
Route::resource('/daftar-pendaftar-ujian', DaftarPendaftarUjianController::class);
Route::get('/daftar-ujian', [DaftarPendaftarUjianController::class, 'create']);
Route::post('/daftar-ujian', [DaftarPendaftarUjianController::class, 'store']);

Route::get('/change-password', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/change-password', [PasswordController::class, 'updatePassword'])->name('password.update');

Route::get('/edit-data-diri', [DashboardController::class, 'edit']);
Route::post('/edit-data-diri', [DashboardController::class, 'update']);


