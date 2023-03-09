<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.dataprofile.profile');
    }

    public function editProfile()
    {
        return view('admin.dataprofile.edit-profile');
    }

    public function ubahPassword()
    {
        return view('admin.dataprofile.password-profile');
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
                return redirect('/profile/ubahpassword')->with('informasi', 'Sesuaikan antara password baru dengan konfirmasi password.');
            } else {
                auth()->user()->update(['password' => bcrypt($request->new_password)]);
                return redirect('/profile')->with('informasi', 'Password Anda berhasil diperbarui.');
            }
        } else 
        {
            return redirect('/profile/ubahpassword')->with('informasi', 'Password tidak sesuai.');
        }
    }
    
    public function update(ProfileRequest $request)
    {
        $foto = $request->file('foto');
        if ($request->hasFile('foto'))
        {
            $extension = $foto->getClientOriginalExtension();
            $fileName = 'petugas-pic' . time(). '.' . $extension;
            $foto->move(public_path('/img/photo-petugas'), $fileName);
            $pic = public_path('/img/photo-petugas/' . $request->pic);
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

        // User::where('id', $id)->update($request->all());
        return redirect('/profile')->with('informasi', 'Data Anda telah diperbarui.');
    }

}
