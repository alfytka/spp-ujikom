<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuktiPembayaranRequest;
use App\Http\Requests\EntriSiswaRequest;
use App\Http\Requests\SiswaProfileRequest;
use App\Models\Bukti_pembayaran;
use App\Models\Buktipembayaran;
use App\Models\Pembayaran;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class ManageSiswaController extends Controller
{
    public function profile()
    {
        if (Gate::allows('siswa'))
        {
            return view('siswa.profile-siswa.index-profile');
        }
        return back();
    }

    public function edit()
    {
        if (Gate::allows('siswa'))
        {
            return view('siswa.profile-siswa.edit-profile');
        }
        return back();
    }

    public function update(SiswaProfileRequest $request)
    {
        $foto = $request->file('foto');
        if ($request->hasFile('foto'))
        {
            $extension = $foto->getClientOriginalExtension();
            $fileName = 'siswa-pic' . time(). '.' . $extension;
            $foto->move(public_path('/img/photo-siswa'), $fileName);
            $pic = public_path('/img/photo-siswa/' . $request->pic);
            File::delete($pic);
            auth()->user()->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'foto' => $fileName
            ]);
        } 
        elseif ($request->all()) {
            auth()->user()->update($request->all());
        }

        return redirect('/profile-siswa')->with('informasi', 'Data Anda telah diperbarui.');
    }

    public function passwordSiswa()
    {
        return view('siswa.profile-siswa.password-siswa');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:5'],
            'konfirmasi_password' => ['required', 'min:5']
        ]);

        if (Hash::check($request->current_password, auth()->user()->password))
        {
            if ($request->new_password != $request->konfirmasi_password)
            {
                return redirect('/profile-siswa/password')->with('informasi', 'Tidak sesuai antara password baru dengan konfirmasi password, coba lagi.');
            } else {
                auth()->user()->update(['password' => bcrypt($request->new_password)]);
                return redirect('/profile-siswa')->with('informasi', 'Password Anda berhasil diperbarui.');
            }
        } else 
        {
            return redirect('/profile-siswa/password')->with('informasi', 'Password tidak sesuai.');
        }
    }

    public function beranda($id)
    {
        if (Gate::allows('siswa'))
        {
            return view('siswa.beranda', [
                'berandasiswa' => Pembayaran::where('siswa_id', $id)->where('status', 'sukses')->orderBy('id','desc')->get(),
                'datasiswa' => User::where('id', $id)->first(),
                'pembayaransiswa' => Pembayaran::where('siswa_id', $id)->count(),
                'datasekolah' => Sekolah::get()->first()
            ]);
        }
        return back();
    }

    public function fyi($id)
    {
        if (Gate::allows('siswa'))
        {
            return view('siswa.fyi', [
                'datasiswa' => User::where('id', $id)->first()
            ]);
        }
        return back();
    }

    public function entriPembayaranSiswa()
    {
        if (Gate::allows('siswa'))
        {
            $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
            $metode_pembayaran = ['Transfer Bank - BRI','Transfer Bank - MANDIRI','Transfer Bank - BCA','Transfer Bank - BJB','GOPAY','OVO','DANA','Lainnya'];
    
            return view('siswa.entri-siswapembayaran', [
                'bulans' => $bulan,
                'metode_pembayaran' => $metode_pembayaran
            ]);
        }
        return back();
    }

    public function postEntriPembayaran(EntriSiswaRequest $request)
    {
        $foto = $request->file('foto_bukti');
        $extension = $foto->getClientOriginalExtension();
        $fileName = 'bukti-pic' . time(). '.' . $extension;
        $foto->move(public_path('/img/photo-siswa'), $fileName);
        
        Pembayaran::create([
            'siswa_id' => $request->siswa_id,
            'tgl_bayar' => $request->tgl_bayar,
            'bulan_bayar' => $request->bulan_bayar,
            'tahun_bayar' => $request->tahun_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => $request->status,
            'foto_bukti' => $fileName
        ]);
        
        return redirect('/siswa/' . auth()->user()->id . '/riwayat-pembayaran')->with('info', 'Tunggu hingga Petugas memproses pembayaran Anda.');
    }

    public function indexHistory($id)
    {
        if (Gate::allows('siswa'))
        {
            return view('siswa.datahistory.index-history', [
                'riwayat' => Pembayaran::where('siswa_id', $id)->orderBy('id', 'desc')->get(),
                // 'buktipembayaran' => Buktipembayaran::where('pembayaran_id', auth()->user()->pembayaranSiswa->id)->get()
            ]);
        }
        return back();
        session()->flash('berhasil', 'Pembayaran berhasil, status: sukses');
    }
}
