<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $countDataKelas = Kelas::all()->count();
        $countDataProdi = Kompetensikeahlian::all()->count();

        return view('admin.dashboard', [
            'countKelas' => $countDataKelas,
            'countProdi' => $countDataProdi
        ]);
    }
}
