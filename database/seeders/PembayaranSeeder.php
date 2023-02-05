<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
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
                'petugas_id' => '1',
                'siswa_id' => '1',
                'tgl_bayar' => '10/10/2022',
                'bulan_bayar' => 'Oktober',
                'tahun_bayar' => '2022',
                'jumlah_bayar' => '200.000'
            ],
            [
                'petugas_id' => '1',
                'siswa_id' => '2',
                'tgl_bayar' => '11/11/2022',
                'bulan_bayar' => 'November',
                'tahun_bayar' => '2022',
                'jumlah_bayar' => '150.000'
            ],
            [
                'petugas_id' => '1',
                'siswa_id' => '3',
                'tgl_bayar' => '1/1/2023',
                'bulan_bayar' => 'Januari',
                'tahun_bayar' => '2023',
                'jumlah_bayar' => '250.000'
            ],
        ])->each(function($pembayaran) {
            Pembayaran::create($pembayaran);
        });
    }
}
