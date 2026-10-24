@extends('layouts.app')

@section('title', $campaign->judul)

@section('content')
    <section class="container detail">
        <a href="{{ route('donasi.index') }}" class="back-link">&larr; Kembali ke daftar campaign</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="detail-grid">
            <div class="detail-main">
                <div class="detail-cover">
                    <span class="chip">{{ $campaign->kategori }}</span>
                    <span class="card-emoji big" aria-hidden="true">💝</span>
                </div>
                <h1>{{ $campaign->judul }}</h1>
                <p class="lead">{{ $campaign->deskripsi }}</p>

                <x-progress-bar
                    :persen="$campaign->persen"
                    :terkumpul="$campaign->terkumpul"
                    :target="$campaign->target" />

                <h2>Donatur terbaru</h2>
                <ul class="donor-list">
                    @forelse ($donatur as $d)
                        <li>
                            <div>
                                <strong>{{ $d['nama'] }}</strong>
                                @if ($d['pesan'])
                                    <p>“{{ $d['pesan'] }}”</p>
                                @endif
                            </div>
                            <span>Rp {{ number_format($d['nominal'], 0, ',', '.') }}</span>
                        </li>
                    @empty
                        <li class="empty-row">Belum ada donatur. Jadilah yang pertama.</li>
                    @endforelse
                </ul>
            </div>

            <aside class="detail-side">
                <h2>Donasi sekarang</h2>
                <form action="{{ route('donasi.store', $campaign->id) }}" method="POST">
                    @csrf

                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}">
                    @error('nama') <small class="error">{{ $message }}</small> @enderror

                    <label for="nominal">Nominal (Rp)</label>
                    <input type="number" id="nominal" name="nominal" min="10000" step="1000" value="{{ old('nominal') }}">
                    @error('nominal') <small class="error">{{ $message }}</small> @enderror

                    <label for="pesan">Pesan (opsional)</label>
                    <textarea id="pesan" name="pesan" rows="3">{{ old('pesan') }}</textarea>
                    @error('pesan') <small class="error">{{ $message }}</small> @enderror

                    <button type="submit" class="btn btn-primary btn-block">Kirim donasi</button>
                </form>
            </aside>
        </div>
    </section>
@endsection
