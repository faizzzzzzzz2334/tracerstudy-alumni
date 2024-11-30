<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Loker;

class LokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Loker::create([
            'nama_perusahaan' => 'PT Kimia Farma',
            'posisi' => 'Apoteker',
            'persyaratan' => 'S1 Farmasi',
            'lokasi' => 'Jakarta',
            'kontak' => '021-12345678',
            'deskripsi' => 'Mencari apoteker yang berpengalaman.',
            'poster' => 'kimiafarma.png',
        ]);

        // Tambahkan data lainnya sesuai kebutuhan
    }
}
