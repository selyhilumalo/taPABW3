<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * Data campaign disimpan statis agar proyek langsung jalan tanpa database.
 * Bila ingin memakai database, ubah class ini menjadi Eloquent Model
 * dan pindahkan data ke migration + seeder.
 */
class Campaign
{
    public static function all(): Collection
    {
        $data = [
            [
                'id' => 1, 'kategori' => 'Pendidikan',
                'judul' => 'Dana Kelas Literasi Digital Keluarga',
                'deskripsi' => 'Program kelas edukasi digital bagi orang tua dan anak agar lebih bijak menggunakan internet.',
                'terkumpul' => 3773456, 'target' => 45000000,
            ],
            [
                'id' => 2, 'kategori' => 'Pencegahan_eksploitasi',
                'judul' => 'Pencegahan Eksploitasi Anak di Wilayah Rawan',
                'deskripsi' => 'Program edukasi dan pendampingan untuk mencegah eksploitasi anak di wilayah rawan sosial.',
                'terkumpul' => 12000000, 'target' => 90000000,
            ],
            [
                'id' => 3, 'kategori' => 'Lansia',
                'judul' => 'Bantuan Kebutuhan Harian Lansia Terlantar',
                'deskripsi' => 'Program bantuan sembako, perlengkapan kebersihan, dan pemeriksaan kesehatan dasar untuk lansia.',
                'terkumpul' => 4200000, 'target' => 80000000,
            ],
            [
                'id' => 4, 'kategori' => 'Anak_yatim',
                'judul' => 'Bantuan Paket Sekolah Anak Yatim',
                'deskripsi' => 'Program penggalangan dana untuk menyediakan tas, buku, alat tulis, dan seragam bagi anak yatim yang membutuhkan.',
                'terkumpul' => 8500000, 'target' => 75000000,
            ],
        ];

        return collect($data)->map(function ($item) {
            $item['persen'] = (int) round($item['terkumpul'] / $item['target'] * 100);
            return (object) $item;
        });
    }

    public static function find(int $id): ?object
    {
        return self::all()->firstWhere('id', $id);
    }

    /** Contoh donatur terbaru (campaign 3 sengaja kosong agar @forelse/@empty terlihat bekerja). */
    public static function donatur(int $campaignId): array
    {
        $semua = [
            1 => [
                ['nama' => 'Hamba Allah', 'nominal' => 100000, 'pesan' => 'Semoga bermanfaat.'],
                ['nama' => 'Rina Marlina', 'nominal' => 250000, 'pesan' => null],
            ],
            2 => [
                ['nama' => 'Dimas Pratama', 'nominal' => 500000, 'pesan' => 'Anak-anak harus aman.'],
            ],
            4 => [
                ['nama' => 'Siti Aminah', 'nominal' => 150000, 'pesan' => 'Semangat belajar!'],
                ['nama' => 'Budi Santoso', 'nominal' => 300000, 'pesan' => null],
                ['nama' => 'Hamba Allah', 'nominal' => 75000, 'pesan' => null],
            ],
        ];

        return $semua[$campaignId] ?? [];
    }
}
