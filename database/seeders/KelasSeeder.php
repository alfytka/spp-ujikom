<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
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
                'kelas' => 'XII RPL 1',
                'kompetensikeahlian_id' => '1'
            ],
            [
                'kelas' => 'XII AKL 1',
                'kompetensikeahlian_id' => '2'
            ],
            [
                'kelas' => 'XII APHP 1',
                'kompetensikeahlian_id' => '3'
            ],
            [
                'kelas' => 'XII TBSM 1',
                'kompetensikeahlian_id' => '4'
            ],
            [
                'kelas' => 'XII APAT 1',
                'kompetensikeahlian_id' => '5'
            ],
        ])->each(function($kelas){
            Kelas::create($kelas);
        });
    }
}
