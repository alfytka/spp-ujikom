<?php

namespace App\Http\Controllers;

use App\Http\Requests\SekolahRequest;
use App\Models\Kelas;
use App\Models\Kompetensikeahlian;
use App\Models\Logactivities;
use App\Models\Pembayaran;
use App\Models\Sekolah;
use App\Models\Spp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

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
            'petugas' => Pembayaran::where('petugas_id', auth()->user()->id)->count(),
            'pembayaranSuccess' => Pembayaran::where('status', 'sukses')->count(),
            'pembayaranDiproses' => Pembayaran::where('status', 'diproses')->count(),
            'logactivities' => Logactivities::orderBy('id', 'desc')->get()
        ]);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginPost(Request $request)
    {

        $now = Carbon::now();
        $greeting = '';

        if ($now->hour < 12)
        {
            $greeting = 'selamat pagi';
            $siswa = 'Selamat pagi';
        } elseif ($now->hour >= 12 && $now->hour < 15)
        {
            $greeting = 'selamat siang';
            $siswa = 'Selamat siang';
        } elseif ($now->hour >= 15 && $now->hour < 18)
        {
            $greeting = 'selamat sore';
            $siswa = 'Selamat sore';
        } else {
            $greeting = 'selamat malam';
            $siswa = 'Selamat malam';
        }

        $loginData = $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();
            $level = auth()->user()->level;
            if ($level == 'admin') {
                return redirect()->intended('/dashboard')->with('success', 'Hello, ' . $greeting);
            } elseif ($level == 'petugas') {
                return redirect()->intended('/dashboard')->with('success', 'Hello, ' . $greeting);
            } elseif ($level == 'siswa') {
                return redirect()->intended('/siswa/' . auth()->user()->id . '/beranda')->with('success', $siswa . ' dan selamat datang di Aplikasi Pembayaran SPP');
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

    public function pengaturan()
    {
        if (Gate::allows('admin'))
        {
            return view('admin.pengaturan', [
                'datasekolah' => Sekolah::all()
            ]);
        }
        return back();
    }

    public function update(SekolahRequest $request, $id)
    {
        $logo = $request->file('logo');
        if ($request->hasFile('logo'))
        {
            $extension = $logo->getClientOriginalExtension();
            $fileName = 'logo-pic' . time(). '.' . $extension;
            $logo->move(public_path('/img/img-me'), $fileName);
            $pic = public_path('/img/img-me/' . $request->pic);
            File::delete($pic);
            Sekolah::where('id', $id)->update([
                'kepala_sekolah' => $request->kepala_sekolah,
                'nip' => $request->nip,
                'nama_sekolah' => $request->nama_sekolah,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'logo' => $fileName
            ]);
        } 
        elseif ($request->all()) {
            Sekolah::where('id', $id)->update([
                'kepala_sekolah' => $request->kepala_sekolah,
                'nip' => $request->nip,
                'nama_sekolah' => $request->nama_sekolah,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat
            ]);
        }

        return redirect('/pengaturan')->with('informasi', 'Data sekolah telah diperbarui.');
    }
        
}
