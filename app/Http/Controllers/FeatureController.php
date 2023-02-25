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
        return view('admin.dashboard', [
            'countKelas' => Kelas::all()->count(),
            'countProdi' => Kompetensikeahlian::all()->count(),
            'countSiswa' => User::where('level', 'siswa')->count(),
            'countPetugas' => User::where('level', 'petugas')->count(),
            'countAdmin' => User::where('level', 'admin')->count(),
            'countSpp' => Spp::all()->count(),
            'countPembayaran' => Pembayaran::all()->count(),
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
                return redirect()->intended('/dashboard')->with('success', 'Hello, selamat datang');
            } elseif ($level == 'petugas') {
                return redirect()->intended('/dashboard')->with('success', 'Hello, selamat datang');
            } elseif ($level == 'siswa') {
                return redirect()->intended('/siswa/' . auth()->user()->id . '/beranda');
            }
        } else {
            return back()->with('error', 'Username atau password salah.');
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
