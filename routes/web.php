<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

// ===== Identitas =====
Route::get('/identitas', fn () => 'Leo Gading Astrada - 242520120 - TI C');

// ===== 3.1 Route sederhana =====
Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'Halo, selamat datang di praktikumleo!';
});

Route::get('/waktu', fn () => now()->format('d-m-Y H:i:s'));

// ===== 3.2 Route dengan parameter =====
Route::get('/profil/{nama}', function (string $nama) {
    return "Halo, {$nama}!";
});

Route::get('/kategori/{nama?}', function (?string $nama = 'semua') {
    return "Menampilkan kategori: {$nama}";
});

Route::get('/kelas/{kode}/mahasiswa/{nim}', function (string $kode, string $nim) {
    return "Kelas {$kode}, NIM {$nim}";
});

// ===== 3.3 Constraint =====
Route::get('/artikel/{id}', function (int $id) {
    return "Artikel nomor {$id}";
})->whereNumber('id');

Route::get('/pengguna/{username}', function (string $username) {
    return "Pengguna: {$username}";
})->whereAlpha('username');

Route::get('/kode/{kode}', function (string $kode) {
    return "Kode: {$kode}";
})->where('kode', '[A-Z]{3}[0-9]{2}');

// ===== 3.4 View dan named route =====
Route::view('/tentang', 'tentang')->name('tentang');

Route::get('/kontak', function () {
    return view('kontak', ['email' => 'info@kampus.ac.id']);
})->name('kontak');

// ===== 3.5 Group dan prefix =====
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn () => 'Dashboard Admin')->name('dashboard');
    Route::get('/pengaturan', fn () => 'Pengaturan Admin')->name('pengaturan');
});

// ===== 3.6 Redirect =====
Route::redirect('/beranda', '/');

// ===== Latihan Controller dan Blade: Profil Mahasiswa =====
Route::get('/profil-mahasiswa', [MahasiswaController::class, 'profil'])
    ->name('mahasiswa.profil');

// ===== Latihan Controller dan Blade: Daftar Mahasiswa =====
Route::get('/mahasiswa', [MahasiswaController::class, 'daftar'])
    ->name('mahasiswa.daftar');

// ===== Latihan Controller dan Blade: Detail Mahasiswa =====
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'detail'])
    ->name('mahasiswa.detail');

// ===== Fallback wajib paling bawah =====
Route::fallback(function () {
    return response('Halaman tidak ditemukan (kustom).', 404);
});
