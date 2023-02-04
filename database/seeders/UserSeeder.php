<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                // siswa
                'nisn' => '3157839204',
                'nis' => '10.2021.321',
                'name' => 'Khikmal Kurniawan',
                'kelas_id' => '1',
                'spp_id' => '1',
                'email' => 'khikmal@gmail.com',
                'username' => 'khikmale',
                'password' => bcrypt('siswa'),
                'telepon' => '08131247821',
                'alamat' => 'Langensari, Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '3117335209',
                'nis' => '10.2021.322',
                'name' => 'Teguh Afriansyah',
                'kelas_id' => '2',
                'spp_id' => '2',
                'email' => 'teguh@gmail.com',
                'username' => 'teguhe',
                'password' => bcrypt('siswa'),
                'telepon' => '08356981457',
                'alamat' => 'Lakbok, Kab. Ciamis, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '3850656435',
                'nis' => '10.2021.323',
                'name' => 'Elfan Hari Saputra',
                'kelas_id' => '1',
                'spp_id' => '1',
                'email' => 'elfan@gmail.com',
                'username' => 'elfane',
                'password' => bcrypt('siswa'),
                'telepon' => '0843660466',
                'alamat' => 'Lakbok, Kab. Ciamis, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '3183258954',
                'nis' => '10.2021.324',
                'name' => 'Andre Daniswara Putra',
                'kelas_id' => '3',
                'spp_id' => '3',
                'email' => 'andre@gmail.com',
                'username' => 'andrek',
                'password' => bcrypt('siswa'),
                'telepon' => '08977336551',
                'alamat' => 'Lakbok, Kab. Ciamis, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // petugas
                'name' => 'Ade Hidayat',
                'email' => 'ade@gmail.com',
                'username' => 'ade',
                'password' => bcrypt('petugas'),
                'telepon' => '0828178173',
                'alamat' => 'Lakbok, Kab. Ciamis, Jawa Barat',
                'level' => 'petugas'
            ],
            [
                // petugas
                'name' => 'Badrul',
                'email' => 'badrul@gmail.com',
                'username' => 'badrul',
                'password' => bcrypt('petugas'),
                'telepon' => '0828178173',
                'alamat' => 'Lakbok, Kab. Ciamis, Jawa Barat',
                'level' => 'petugas'
            ],
            [
                // admin
                'name' => 'Rose',
                'email' => 'rose@gmail.com',
                'username' => 'rose',
                'password' => bcrypt('petugas'),
                'telepon' => '0828178782',
                'alamat' => 'Lakbok, Kab. Ciamis, Jawa Barat',
                'level' => 'petugas'
            ],
        ])->each(function($siswa){
            User::create($siswa);
        });
    }
}
