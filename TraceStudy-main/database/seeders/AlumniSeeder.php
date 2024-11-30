<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumni;

class AlumniSeeder extends Seeder
{
    public function run()
    {
        $alumniData = [
            [
                'nama' => 'John Doe',
                'nim' => '123456789',
                'prodi' => 'Teknik Informatika',
                'angkatan' => 2020,
                'status' => 'bekerja',
                'institusi' => 'PT Kimia Farma Tbk',
            ],
            [
                'nama' => 'Jane Smith',
                'nim' => '987654321',
                'prodi' => 'Sistem Informasi',
                'angkatan' => 2019,
                'status' => 'tidak bekerja',
                'institusi' => null,
            ],
            [
                'nama' => 'Alice Johnson',
                'nim' => '456123789',
                'prodi' => 'Teknik Komputer',
                'angkatan' => 2021,
                'status' => 'bekerja',
                'institusi' => 'PT Biofarma',
            ],
            [
                'nama' => 'Bob Brown',
                'nim' => '321654987',
                'prodi' => 'Manajemen',
                'angkatan' => 2018,
                'status' => 'bekerja',
                'institusi' => 'Petrokimia Gresik',
            ],
            [
                'nama' => 'Charlie Green',
                'nim' => '654321789',
                'prodi' => 'Akuntansi',
                'angkatan' => 2022,
                'status' => 'tidak bekerja',
                'institusi' => null,
            ],
        ];

        foreach ($alumniData as $alumni) {
            Alumni::create($alumni);
        }
    }
}
