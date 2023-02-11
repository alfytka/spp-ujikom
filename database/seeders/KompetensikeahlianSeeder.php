<?php

namespace Database\Seeders;

use App\Models\Kompetensikeahlian;
use Illuminate\Database\Seeder;

class KompetensikeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'keterangan' => 'RPL'
            ],
            [
                'name' => 'Akuntansi Keuangan Lembaga',
                'keterangan' => 'AKL'
            ],
            [
                'name' => 'Agribisnis Pengolahan Hasil Pertanian',
                'keterangan' => 'APHP'
            ],
            [
                'name' => 'Teknik Bisnis Sepeda Motor',
                'keterangan' => 'TBSM'
            ],
            [
                'name' => 'Agribisnis Perikanan Air Tawar',
                'keterangan' => 'APAT'
            ]
        ])->each(function($dataProdi){
            Kompetensikeahlian::create($dataProdi);
        });
    }
}
