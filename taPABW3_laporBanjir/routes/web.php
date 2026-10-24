<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

// Halaman utama diarahkan ke form pelaporan
Route::redirect('/', '/lapor');

// 1. Form pelaporan (GET) dan proses kirim (POST)
Route::get('/lapor', [LaporanController::class, 'form'])->name('lapor.form');
Route::post('/lapor', [LaporanController::class, 'kirim'])->name('lapor.kirim');

// 2. Halaman konfirmasi (menampilkan kembali data yang dikirim)
Route::get('/konfirmasi', [LaporanController::class, 'konfirmasi'])->name('lapor.konfirmasi');

// 3. Daftar laporan banjir
Route::get('/laporan', [LaporanController::class, 'daftar'])->name('lapor.daftar');
