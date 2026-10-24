@extends('layouts.app')

@section('title', 'Form Pelaporan')

@section('content')
    <h2 class="judul">Form Pelaporan Banjir</h2>
    <p class="sub">Laporkan kejadian banjir di wilayah Anda agar dapat segera ditangani petugas BPBD.</p>

    @if (session('info'))
        <x-alert type="info">{{ session('info') }}</x-alert>
    @endif

    @if ($errors->any())
        <x-alert type="danger" title="Periksa kembali isian Anda:">
            <ul style="margin:6px 0 0 18px;padding:0">
                @foreach ($errors->all() as $pesan)
                    <li>{{ $pesan }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <form class="kartu" action="{{ route('lapor.kirim') }}" method="POST">
        @csrf

        <div class="field">
            <label for="nama">Nama Pelapor</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Budi Santoso" required>
            @error('nama') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="lokasi">Lokasi Kejadian</label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: Jl. Raya Dayeuhkolot, RT 02/RW 05" required>
            @error('lokasi') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="tinggi">Tinggi Genangan Air (cm)</label>
            <input type="number" id="tinggi" name="tinggi" value="{{ old('tinggi') }}" min="0" max="1000" step="any" placeholder="Contoh: 45" required>
            <small>&lt; 30 cm Waspada &middot; 30&ndash;70 cm Siaga &middot; &gt; 70 cm Awas</small>
            @error('tinggi') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Kirim Laporan</button>
    </form>
@endsection
