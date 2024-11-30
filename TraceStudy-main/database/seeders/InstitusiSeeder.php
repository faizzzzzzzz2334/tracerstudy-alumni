<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institusi;

class InstitusiSeeder extends Seeder
{
    public function run()
    {
        $institusiData = [
            [
                'nama' => 'PT Kimia Farma Tbk',
                'logo' => 'kimiafarma.png',
                'alamat' => 'Jl. Kimia Farma No.1, Jakarta',
                'email' => 'info@kimiafarma.com',
            ],
            [
                'nama' => 'PT Biofarma',
                'logo' => 'biofarma.png',
                'alamat' => 'Jl. Biofarma No.2, Bandung',
                'email' => 'info@biofarma.com',
            ],
            [
                'nama' => 'Petrokimia Gresik',
                'logo' => 'petrokimia.png',
                'alamat' => 'Jl. Petrokimia No.3, Gresik',
                'email' => 'info@petrokimia.com',
            ],
            [
                'nama' => 'PT Indofarma',
                'logo' => 'indofarma.png',
                'alamat' => 'Jl. Indofarma No.4, Jakarta',
                'email' => 'info@indofarma.com',
            ],
            [
                'nama' => 'PT Sido Muncul',
                'logo' => 'sidomuncul.png',
                'alamat' => 'Jl. Sido Muncul No.5, Semarang',
                'email' => 'info@sidomuncul.com',
            ],
        ];

        foreach ($institusiData as $data) {
            Institusi::create($data);
        }
    }
} 