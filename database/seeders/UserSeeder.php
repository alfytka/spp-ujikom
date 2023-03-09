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
                'nisn' => '1007750010',
                'nis' => '10.2020.323',
                'name' => 'Alfitka Haerul Kurniawan',
                'kelas_id' => '1',
                'spp_id' => '1',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'alfitka@gmail.com',
                'username' => 'Alfitka',
                'password' => bcrypt('siswa'),
                'telepon' => '081213423429',
                'alamat' => 'Langensari, Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750011',
                'nis' => '10.2020.324',
                'name' => 'Andre Daniswara Putra',
                'kelas_id' => '1',
                'spp_id' => '1',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'andre@gmail.com',
                'username' => 'Andre',
                'password' => bcrypt('siswa'),
                'telepon' => '082313423429',
                'alamat' => 'Lakbok, Kab. Ciamis, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750099',
                'nis' => '10.2020.388',
                'name' => 'Amelia',
                'kelas_id' => '3',
                'spp_id' => '3',
                'jenis_kelamin' => 'Perempuan',
                'email' => 'amel@gmail.com',
                'username' => 'Amel',
                'password' => bcrypt('siswa'),
                'telepon' => '087713423429',
                'alamat' => 'langensari, Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750012',
                'nis' => '10.2020.325',
                'name' => 'Atyla Azfa Al Harits',
                'kelas_id' => '1',
                'spp_id' => '1',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'atyle@gmail.com',
                'username' => 'Atyla',
                'password' => bcrypt('siswa'),
                'telepon' => '082413423429',
                'alamat' => 'Lakbok, Kab. Ciamis, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750013',
                'nis' => '10.2020.326',
                'name' => 'Dimas Adirawijaya',
                'kelas_id' => '2',
                'spp_id' => '1',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'dimas@gmail.com',
                'username' => 'Dimas',
                'password' => bcrypt('siswa'),
                'telepon' => '082513433429',
                'alamat' => 'Lakbok, Kab. Ciamis, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750014',
                'nis' => '10.2020.327',
                'name' => 'Dwi Utami',
                'kelas_id' => '2',
                'spp_id' => '1',
                'jenis_kelamin' => 'Perempuan',
                'email' => 'dwi@gmail.com',
                'username' => 'Tami',
                'password' => bcrypt('siswa'),
                'telepon' => '083613433429',
                'alamat' => 'Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750024',
                'nis' => '10.2020.391',
                'name' => 'Sasika',
                'kelas_id' => '2',
                'spp_id' => '1',
                'jenis_kelamin' => 'Perempuan',
                'email' => 'sasika@gmail.com',
                'username' => 'Sasika',
                'password' => bcrypt('siswa'),
                'telepon' => '089913433429',
                'alamat' => 'Langensari, Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750015',
                'nis' => '10.2020.328',
                'name' => 'Elfan Hari Saputra',
                'kelas_id' => '2',
                'spp_id' => '1',
                'jenis_kelamin' => 'Perempuan',
                'email' => 'elfan@gmail.com',
                'username' => 'Elfan',
                'password' => bcrypt('siswa'),
                'telepon' => '0838134334129',
                'alamat' => 'Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750016',
                'nis' => '10.2020.329',
                'name' => 'Irfan Maulana',
                'kelas_id' => '2',
                'spp_id' => '1',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'irfan@gmail.com',
                'username' => 'Irfan',
                'password' => bcrypt('siswa'),
                'telepon' => '083934334129',
                'alamat' => 'Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750017',
                'nis' => '10.2020.330',
                'name' => 'Khikmal Kurniawan',
                'kelas_id' => '2',
                'spp_id' => '1',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'khikmal@gmail.com',
                'username' => 'Khikmal',
                'password' => bcrypt('siswa'),
                'telepon' => '084034334129',
                'alamat' => 'Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750018',
                'nis' => '10.2020.331',
                'name' => 'Rafli Al-Musyafa',
                'kelas_id' => '2',
                'spp_id' => '1',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'rafli@gmail.com',
                'username' => 'Rafli',
                'password' => bcrypt('siswa'),
                'telepon' => '084134334129',
                'alamat' => 'Langensari, Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750019',
                'nis' => '10.2020.332',
                'name' => 'Renal Ajrun Adhim Ramadhan',
                'kelas_id' => '2',
                'spp_id' => '1',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'renal@gmail.com',
                'username' => 'Renal',
                'password' => bcrypt('siswa'),
                'telepon' => '084234334129',
                'alamat' => 'Langensari, Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750020',
                'nis' => '10.2020.333',
                'name' => 'Teguh Afriansyah',
                'kelas_id' => '3',
                'spp_id' => '2',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'teguh@gmail.com',
                'username' => 'Teguh',
                'password' => bcrypt('siswa'),
                'telepon' => '085534334129',
                'alamat' => 'Langensari, Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // siswa
                'nisn' => '1007750021',
                'nis' => '10.2020.334',
                'name' => 'Trio Adi Permana',
                'kelas_id' => '3',
                'spp_id' => '2',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'trio@gmail.com',
                'username' => 'Trio',
                'password' => bcrypt('siswa'),
                'telepon' => '085634334129',
                'alamat' => 'Kota Banjar, Jawa Barat',
                'level' => 'siswa'
            ],
            [
                // petugas
                'name' => 'Maman Suparman',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'maman@gmail.com',
                'username' => 'Maman',
                'password' => bcrypt('petugas'),
                'telepon' => '082885178173',
                'alamat' => 'Lakbok, Kab. Ciamis, Jawa Barat',
                'level' => 'petugas'
            ],
            [
                // petugas
                'name' => 'Hermes',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'hermes@gmail.com',
                'username' => 'Hermes',
                'password' => bcrypt('petugas'),
                'telepon' => '082819718173',
                'alamat' => 'Kota Banjar, Jawa Barat',
                'level' => 'petugas'
            ],
            [
                // petugas
                'name' => 'Ahmad Dahlan',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'ahmad@gmail.com',
                'username' => 'Ahmad',
                'password' => bcrypt('petugas'),
                'telepon' => '080019718173',
                'alamat' => 'Kota Banjar, Jawa Barat',
                'level' => 'petugas'
            ],
            [
                // petugas
                'name' => 'Muhammad Nasirudin',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'nasir@gmail.com',
                'username' => 'Nasirudin',
                'password' => bcrypt('petugas'),
                'telepon' => '084319718173',
                'alamat' => 'Kota Banjar, Jawa Barat',
                'level' => 'petugas'
            ],
            [
                // admin
                'name' => 'Indra Sihombing',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'indra@gmail.com',
                'username' => 'Indra',
                'password' => bcrypt('admin'),
                'telepon' => '082811783782',
                'alamat' => 'Kota Bandung, Jawa Barat',
                'level' => 'admin'
            ],
            [
                // admin
                'name' => 'Wahyu Nurdiansyah',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'wahyu@gmail.com',
                'username' => 'Waeng',
                'password' => bcrypt('admin'),
                'telepon' => '081281787382',
                'alamat' => 'Langensari, Kota Banjar, Jawa Barat',
                'level' => 'admin'
            ],
            [
                // admin
                'name' => 'Farhan',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'farhan@gmail.com',
                'username' => 'Farhan',
                'password' => bcrypt('admin'),
                'telepon' => '082819787820',
                'alamat' => 'Kota Bandung, Jawa Barat',
                'level' => 'admin'
            ],
            [
                // admin
                'name' => 'Agus Fahmi',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'agus@gmail.com',
                'username' => 'Agus',
                'password' => bcrypt('admin'),
                'telepon' => '082881787682',
                'alamat' => 'Lakbok, Kab. Ciamis, Jawa Barat',
                'level' => 'admin'
            ],
            [
                // admin
                'name' => 'Kemal',
                'jenis_kelamin' => 'Laki-laki',
                'email' => 'kemal@gmail.com',
                'username' => 'Kemal',
                'password' => bcrypt('admin'),
                'telepon' => '082081780782',
                'alamat' => 'DKI Jakarta',
                'level' => 'admin'
            ],
        ])->each(function($siswa){
            User::create($siswa);
        });
    }
}
