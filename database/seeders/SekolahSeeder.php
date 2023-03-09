<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
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
                'kepala_sekolah' => 'Drs. H. Maman Sudirman, M.M',
                'nip' => '19651021 199011 1 00',
                'nama_sekolah' => 'SMK NEGERI 3 BANJAR',
                'telepon' => '0827185848292',
                'alamat' => 'Jl. Jualeni, Langensari, Kota Banjar, Jawa Barat'
            ]
        ])->each(function($sekolah){
            Sekolah::create($sekolah);
        });
    }
}
