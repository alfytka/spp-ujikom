<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kompetensikeahlian;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function dashboard()
    {
        $countDataKelas = Kelas::all()->count();
        $countDataProdi = Kompetensikeahlian::all()->count();
        $countDataSiswa = User::where('level', 'siswa')->count();
        $countDataSpp = Spp::all()->count();
        $countDataPetugas = User::where('level', 'petugas')->count();
        $countDataPembayaran = Pembayaran::all()->count();

        return view('admin.dashboard', [
            'countKelas' => $countDataKelas,
            'countProdi' => $countDataProdi,
            'countSiswa' => $countDataSiswa,
            'countSpp' => $countDataSpp,
            'countPetugas' => $countDataPetugas,
            'countPembayaran' => $countDataPembayaran,
        ]);
    }
        
}
