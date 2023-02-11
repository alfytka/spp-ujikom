<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kompetensikeahlian;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatureController extends Controller
{
    public function dashboard()
    {
        $countDataKelas = Kelas::all()->count();
        $countDataProdi = Kompetensikeahlian::all()->count();
        $countDataSpp = Spp::all()->count();
        $countDataSiswa = User::where('level', 'siswa')->count();
        $countDataPetugas = User::where('level', 'petugas')->count();
        $countDataAdmin = User::where('level', 'admin')->count();
        $countDataPembayaran = Pembayaran::all()->count();

        return view('admin.dashboard', [
            'countKelas' => $countDataKelas,
            'countProdi' => $countDataProdi,
            'countSiswa' => $countDataSiswa,
            'countAdmin' => $countDataAdmin,
            'countSpp' => $countDataSpp,
            'countPetugas' => $countDataPetugas,
            'countPembayaran' => $countDataPembayaran,
        ]);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginPost(Request $request)
    {
        $loginData = $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();
            $level = auth()->user()->level;
            if ($level == 'admin') {
                return redirect()->intended('/dashboard');
            } elseif ($level == 'petugas') {
                return redirect()->intended('/datapembayaran');
            } else {
                return redirect()->intended('/cek');
            }
        } else {
            return back()->with('loginError', 'Username atau password salah.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }
        
}
