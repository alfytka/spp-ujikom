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
                'tgl_bayar' => '2020-10-10',
                'bulan_bayar' => 'Oktober',
                'tahun_bayar' => '2022',
                'jumlah_bayar' => '100000'
            ],
            [
                'petugas_id' => '1',
                'siswa_id' => '2',
                'tgl_bayar' => '2022-9-9',
                'bulan_bayar' => 'November',
                'tahun_bayar' => '2022',
                'jumlah_bayar' => '120000'
            ],
            [
                'petugas_id' => '2',
                'siswa_id' => '3',
                'tgl_bayar' => '2022-12-12',
                'bulan_bayar' => 'Januari',
                'tahun_bayar' => '2023',
                'jumlah_bayar' => '100000'
            ],
            [
                'petugas_id' => '3',
                'siswa_id' => '4',
                'tgl_bayar' => '2022-2-2',
                'bulan_bayar' => 'Februari',
                'tahun_bayar' => '2023',
                'jumlah_bayar' => '100000'
            ],
        ])->each(function($pembayaran) {
            Pembayaran::create($pembayaran);
        });
    }
}
