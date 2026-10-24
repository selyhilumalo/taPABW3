{{--
    Partial kartu laporan.
    Variabel yang diterima: $laporan (array: nama, lokasi, tinggi, waktu)
--}}

{{-- Status genangan: < 30 cm Waspada | 30-70 cm Siaga | > 70 cm Awas --}}
@if ($laporan['tinggi'] < 30)
    @php
        $status = 'Waspada';
        $kelas  = 'waspada';
    @endphp
@elseif ($laporan['tinggi'] <= 70)
    @php
        $status = 'Siaga';
        $kelas  = 'siaga';
    @endphp
@else
    @php
        $status = 'Awas';
        $kelas  = 'awas';
    @endphp
@endif

<article class="kartu laporan {{ $kelas }}">
    <h3>📍 {{ $laporan['lokasi'] }}</h3>
    <p class="meta">
        Dilaporkan oleh <strong>{{ $laporan['nama'] }}</strong><br>
        {{ \Carbon\Carbon::parse($laporan['waktu'])->locale('id')->translatedFormat('d F Y, H:i') }} WIB
    </p>
    <div class="tinggi">{{ round($laporan['tinggi'], 1) }} cm</div>
    <span class="badge {{ $kelas }}">{{ $status }}</span>
</article>
