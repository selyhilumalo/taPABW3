@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('content')
    <h2 class="judul">Daftar Laporan Banjir</h2>
    <p class="sub">Contoh laporan banjir yang masuk ke BPBD Kabupaten Bandung.</p>

    <div class="legend">
        <span><span class="badge waspada">Waspada</span> &lt; 30 cm</span>
        <span><span class="badge siaga">Siaga</span> 30&ndash;70 cm</span>
        <span><span class="badge awas">Awas</span> &gt; 70 cm</span>
    </div>

    <div class="grid">
        @forelse ($daftarLaporan as $laporan)
            @include('partials.laporan-card', ['laporan' => $laporan])
        @empty
            <div class="kartu">Belum ada laporan banjir.</div>
        @endforelse
    </div>
@endsection
