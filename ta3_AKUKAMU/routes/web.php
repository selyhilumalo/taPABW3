<?php

use App\Http\Controllers\DonasiController;
use Illuminate\Support\Facades\Route;

Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi.index');
Route::get('/donasi/{id}', [DonasiController::class, 'show'])->whereNumber('id')->name('donasi.show');
Route::post('/donasi/{id}', [DonasiController::class, 'store'])->whereNumber('id')->name('donasi.store');

$halamanLain = [
    'beranda'   => ['/',          'Beranda'],
    'volunteer' => ['/volunteer', 'Volunteer'],
    'edukasi'   => ['/edukasi',   'Edukasi'],
    'forum'     => ['/forum',     'Forum'],
    'peta'      => ['/peta',      'Peta'],
    'kalender'  => ['/kalender',  'Kalender'],
    'cerita'    => ['/cerita',    'Cerita'],
    'login'     => ['/login',     'Login'],
    'daftar'    => ['/daftar',    'Daftar'],
];

foreach ($halamanLain as $nama => [$uri, $judul]) {
    Route::get($uri, fn () => view('placeholder', ['judul' => $judul]))->name($nama);
}
