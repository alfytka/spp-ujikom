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
                'petugas_id' => '17',
                'siswa_id' => '1',
                'tgl_bayar' => '2020-1-1',
                'bulan_bayar' => 'Januari',
                'tahun_bayar' => '2020',
                'jumlah_bayar' => '100000',
                'jenis_pembayaran' => 'petugas'
            ],
            [
                'petugas_id' => '17',
                'siswa_id' => '1',
                'tgl_bayar' => '2020-2-2',
                'bulan_bayar' => 'Februari',
                'tahun_bayar' => '2020',
                'jumlah_bayar' => '100000',
                'jenis_pembayaran' => 'petugas'
            ],
            [
                'petugas_id' => '17',
                'siswa_id' => '1',
                'tgl_bayar' => '2020-3-3',
                'bulan_bayar' => 'Maret',
                'tahun_bayar' => '2020',
                'jumlah_bayar' => '100000',
                'jenis_pembayaran' => 'petugas'
            ],
            [
                'petugas_id' => '17',
                'siswa_id' => '2',
                'tgl_bayar' => '2022-1-1',
                'bulan_bayar' => 'Januari',
                'tahun_bayar' => '2022',
                'jumlah_bayar' => '100000',
                'jenis_pembayaran' => 'petugas'
            ],
        ])->each(function($pembayaran) {
            Pembayaran::create($pembayaran);
        });
    }
}
