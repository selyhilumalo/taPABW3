@extends('layouts.app')

@section('title', 'Konfirmasi Laporan')

@section('content')
    <h2 class="judul">Konfirmasi Laporan</h2>
    <p class="sub">Berikut data yang telah Anda kirim.</p>

    {{-- Komponen Blade <x-alert> --}}
    <x-alert type="success" title="Laporan berhasil dikirim!">
        Terima kasih, <strong>{{ $laporan['nama'] }}</strong>. Laporan Anda sudah diterima BPBD Kabupaten Bandung dan akan segera ditindaklanjuti.
    </x-alert>

    {{-- Menampilkan kembali data yang dikirim, memakai partial kartu laporan --}}
    <div class="grid">
        @include('partials.laporan-card', ['laporan' => $laporan])
    </div>

    <div class="aksi">
        <a href="{{ route('lapor.form') }}" class="btn">Buat Laporan Baru</a>
        <a href="{{ route('lapor.daftar') }}" class="btn sekunder">Lihat Daftar Laporan</a>
    </div>
@endsection
