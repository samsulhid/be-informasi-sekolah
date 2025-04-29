<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galleri; // Pastikan model Galleri sudah ada

class GalleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Galleri::create([
            'title' => 'Kegiatan Sekolah',
            'description' => 'Dokumentasi kegiatan sekolah tahun 2025.',
            'image_url' => 'images/kegiatan-sekolah.jpg',
        ]);

        Galleri::create([
            'title' => 'Prestasi Siswa',
            'description' => 'Foto-foto prestasi siswa di berbagai lomba.',
            'image_url' => 'images/prestasi-siswa.jpg',
        ]);

        Galleri::create([
            'title' => 'Fasilitas Sekolah',
            'description' => 'Gambar fasilitas sekolah yang mendukung pembelajaran.',
            'image_url' => 'images/fasilitas-sekolah.jpg',
        ]);
    }
}
