<?php

namespace Database\Seeders;

use App\Models\Spp;
use Illuminate\Database\Seeder;

class SppSeeder extends Seeder
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
                'tahun' => '2020',
                'nominal' => '100000'
            ],
            [
                'tahun' => '2021',
                'nominal' => '120000'
            ],
            [
                'tahun' => '2022',
                'nominal' => '100000'
            ],
            [
                'tahun' => '2023',
                'nominal' => '100000'
            ]
        ])->each(function($dataspp){
            Spp::create($dataspp);
        });
    }
}
