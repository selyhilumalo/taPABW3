<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') - LaporBanjir BPBD Kabupaten Bandung</title>
    <style>
        :root {
            --biru: #0b5ed7;
            --biru-tua: #0a3f8f;
            --abu: #f3f6fb;
            --teks: #1f2937;
            --hijau: #15803d;
            --kuning: #b45309;
            --merah: #b91c1c;
        }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: "Segoe UI", Arial, sans-serif; color: var(--teks); background: var(--abu); line-height: 1.55; }
        .wrap { width: min(960px, 92%); margin: 0 auto; }

        /* Header & navigasi */
        header.site { background: linear-gradient(135deg, var(--biru-tua), var(--biru)); color: #fff; }
        header.site .wrap { padding: 22px 0 0; }
        header.site h1 { margin: 0; font-size: 1.7rem; }
        header.site p { margin: 4px 0 16px; opacity: .85; font-size: .95rem; }
        nav.menu { display: flex; gap: 6px; flex-wrap: wrap; }
        nav.menu a { color: #fff; text-decoration: none; padding: 10px 18px; border-radius: 8px 8px 0 0; font-weight: 600; opacity: .8; }
        nav.menu a:hover { opacity: 1; background: rgba(255,255,255,.12); }
        nav.menu a.aktif { background: var(--abu); color: var(--biru-tua); opacity: 1; }

        main { padding: 28px 0 40px; min-height: 55vh; }
        h2.judul { margin: 0 0 6px; color: var(--biru-tua); }
        .sub { margin: 0 0 22px; color: #4b5563; }

        /* Form */
        .kartu { background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 2px 10px rgba(15,23,42,.07); }
        .field { margin-bottom: 16px; }
        .field label { display: block; font-weight: 600; margin-bottom: 6px; }
        .field input { width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 1rem; }
        .field input:focus { outline: 2px solid #93c5fd; border-color: var(--biru); }
        .field small { color: #6b7280; }
        .error { color: var(--merah); font-size: .88rem; margin-top: 4px; }
        .btn { display: inline-block; background: var(--biru); color: #fff; border: 0; padding: 11px 22px; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; text-decoration: none; }
        .btn:hover { background: var(--biru-tua); }
        .btn.sekunder { background: #e2e8f0; color: var(--teks); }
        .btn.sekunder:hover { background: #cbd5e1; }
        .aksi { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 18px; }

        /* Kartu laporan */
        .grid { display: grid; gap: 16px; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); }
        .laporan { border-left: 6px solid #94a3b8; }
        .laporan h3 { margin: 0 0 4px; font-size: 1.05rem; }
        .laporan .meta { color: #6b7280; font-size: .88rem; margin: 0 0 10px; }
        .laporan .tinggi { font-size: 1.6rem; font-weight: 700; margin: 6px 0; }
        .laporan.waspada { border-left-color: var(--hijau); }
        .laporan.siaga { border-left-color: var(--kuning); }
        .laporan.awas { border-left-color: var(--merah); }
        .badge { display: inline-block; padding: 3px 12px; border-radius: 999px; font-size: .82rem; font-weight: 700; color: #fff; }
        .badge.waspada { background: var(--hijau); }
        .badge.siaga { background: var(--kuning); }
        .badge.awas { background: var(--merah); }
        .legend { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 18px; font-size: .9rem; }

        /* Komponen alert */
        .alert { padding: 14px 18px; border-radius: 10px; margin-bottom: 20px; border: 1px solid; }
        .alert strong { display: block; margin-bottom: 2px; }
        .alert.success { background: #ecfdf5; border-color: #86efac; color: #166534; }
        .alert.info { background: #eff6ff; border-color: #93c5fd; color: #1e40af; }
        .alert.danger { background: #fef2f2; border-color: #fca5a5; color: #991b1b; }

        footer.site { background: #0f172a; color: #cbd5e1; text-align: center; padding: 20px 0; font-size: .9rem; }
    </style>
</head>
<body>

    {{-- ===== HEADER ===== --}}
    <header class="site">
        <div class="wrap">
            <h1>🌊 LaporBanjir</h1>
            <p>Sistem Pelaporan Banjir &mdash; BPBD Kabupaten Bandung</p>

            {{-- ===== MENU NAVIGASI (named route) ===== --}}
            <nav class="menu">
                <a href="{{ route('lapor.form') }}" class="{{ request()->routeIs('lapor.form', 'lapor.konfirmasi') ? 'aktif' : '' }}">Form Pelaporan</a>
                <a href="{{ route('lapor.daftar') }}" class="{{ request()->routeIs('lapor.daftar') ? 'aktif' : '' }}">Daftar Laporan</a>
            </nav>
        </div>
    </header>

    {{-- ===== KONTEN HALAMAN ===== --}}
    <main>
        <div class="wrap">
            @yield('content')
        </div>
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="site">
        <div class="wrap">
            &copy; {{ date('Y') }} BPBD Kabupaten Bandung &middot; LaporBanjir (prototipe)
        </div>
    </footer>

</body>
</html>
