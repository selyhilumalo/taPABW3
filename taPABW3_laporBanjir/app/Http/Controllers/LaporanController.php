<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    private function dataLaporan(): array
    {
        return [
            ['id' => 1, 'nama' => 'Asep Sunandar',   'lokasi' => 'Kp. Cieunteung, Baleendah',    'tinggi' => 85, 'waktu' => '2026-10-05 07:15'],
            ['id' => 2, 'nama' => 'Siti Nurhayati',  'lokasi' => 'Jl. Raya Dayeuhkolot',          'tinggi' => 50, 'waktu' => '2026-10-05 08:40'],
            ['id' => 3, 'nama' => 'Dedi Kurniawan',  'lokasi' => 'Perumahan Bojongsoang Indah',   'tinggi' => 25, 'waktu' => '2026-10-05 09:05'],
            ['id' => 4, 'nama' => 'Ratna Wulandari', 'lokasi' => 'Desa Sukamaju, Majalaya',       'tinggi' => 70, 'waktu' => '2026-10-05 10:30'],
            ['id' => 5, 'nama' => 'Yusuf Maulana',   'lokasi' => 'Jl. Kopo Sayati, Margahayu',    'tinggi' => 10, 'waktu' => '2026-10-05 11:00'],
        ];
    }

    public function form()
    {
        return view('lapor.form');
    }

    public function kirim(Request $request)
    {
        $data = $request->validate([
            'nama'   => ['required', 'string', 'max:100'],
            'lokasi' => ['required', 'string', 'max:150'],
            'tinggi' => ['required', 'numeric', 'min:0', 'max:1000'],
        ], [
            'nama.required'   => 'Nama pelapor wajib diisi.',
            'lokasi.required' => 'Lokasi kejadian wajib diisi.',
            'tinggi.required' => 'Tinggi genangan wajib diisi.',
            'tinggi.numeric'  => 'Tinggi genangan harus berupa angka (cm).',
            'tinggi.min'      => 'Tinggi genangan tidak boleh negatif.',
            'tinggi.max'      => 'Tinggi genangan maksimal 1000 cm.',
        ]);

        $laporan = [
            'nama'   => $data['nama'],
            'lokasi' => $data['lokasi'],
            'tinggi' => (float) $data['tinggi'],
            'waktu'  => now()->format('Y-m-d H:i'),
        ];

        return redirect()->route('lapor.konfirmasi')->with('laporan', $laporan);
    }

    public function konfirmasi()
    {
        $laporan = session('laporan');

        if (!$laporan) {
            return redirect()
                ->route('lapor.form')
                ->with('info', 'Belum ada laporan yang dikirim. Silakan isi form terlebih dahulu.');
        }

        return view('lapor.konfirmasi', ['laporan' => $laporan]);
    }

    public function daftar()
    {
        return view('lapor.daftar', ['daftarLaporan' => $this->dataLaporan()]);
    }
}
