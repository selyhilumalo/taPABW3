@extends('layouts.app')

@section('title', 'Campaign Donasi')

@section('content')
    <section class="page-head">
        <div>
            <span class="eyebrow">Konten publik</span>
            <h1>Campaign Donasi</h1>
            <p>Pilih campaign sosial yang ingin didukung secara transparan.</p>
        </div>
        <a href="{{ route('daftar') }}" class="btn btn-dark">Buat Akun</a>
    </section>

    <section class="container">
        <div class="grid">
            @forelse ($campaigns as $campaign)
                <x-campaign-card :campaign="$campaign" />
            @empty
                <div class="empty">
                    <p>Belum ada campaign donasi yang aktif. Silakan kembali lagi nanti.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
