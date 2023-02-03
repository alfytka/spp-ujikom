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
                'nominal' => '700000'
            ],
            [
                'tahun' => '2021',
                'nominal' => '800000'
            ],
            [
                'tahun' => '2022',
                'nominal' => '850000'
            ],
            [
                'tahun' => '2023',
                'nominal' => '800000'
            ]
        ])->each(function($dataspp){
            Spp::create($dataspp);
        });
    }
}
