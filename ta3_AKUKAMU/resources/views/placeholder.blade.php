@extends('layouts.app')

@section('title', $judul)

@section('content')
    <section class="page-head">
        <div>
            <h1>{{ $judul }}</h1>
            <p>Halaman ini belum dikerjakan. Fitur yang tersedia saat ini adalah Donasi.</p>
        </div>
        <a href="{{ route('donasi.index') }}" class="btn btn-primary">Lihat Donasi</a>
    </section>
@endsection
