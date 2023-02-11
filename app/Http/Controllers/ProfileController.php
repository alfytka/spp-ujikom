<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
                return redirect('/profile/ubahpassword')->with('informasi', 'Sesuaikan antara Password Baru dengan Konfirmasi Password.');
            } else {
                auth()->user()->update(['password' => bcrypt($request->new_password)]);
                return redirect('/profile')->with('informasi', 'Password Anda berhasil diperbarui.');
            }
        } else 
        {
            return redirect('/profile/ubahpassword')->with('informasi', 'Password tidak sesuai.');
        }

        // if ($request->current_password === $request->password)
        // {
        //     if ($request->new_password === $request->konfirmasi_password)
        //     {
        //         auth()->user()->update($request->all());
        //     }
        //     else 
        //     {
        //         return redirect('profile/ubahpassword')->with('informasi', 'Password baru tidak sesuai dengan konfirmasi password.');
        //     }
        // } else 
        // {
        //     return redirect('/profile/ubahpassword')->with('informasi', 'Password yang Anda masukkan tidak sesuai.');
        // }
    }
    
    public function update(ProfileRequest $request)
    {
        // User::where('id', $id)->update($request->all());
        auth()->user()->update($request->all());
        return redirect('/profile')->with('informasi', 'Data Anda telah diperbarui.');
    }

    // public function changePassword(Request $request)
    // {
    //     // $request->validate([
    //     //     'current_password' => ['required'],
    //     //     'password' => ['required', 'min:8', 'confirmed'],
    //     // ]);

    //     // if (Hash::check($request->current_password, auth()->user()->password)) {
    //     //     auth()->user()->update(['password' => bcrypt($request->konfirmasi_password)]);
    //     //     return redirect('/profile')->with('informasi', 'Password Anda telah diperbarui.');
    //     // }

    //     if ($request->current_password == auth()->user()->password) {
    //         if ($request->new_password == $request->konfirmasi_password) {
    //             auth()->user()->update(['password' => bcrypt($request->konfirmasi_password)]);
    //         } else {
    //             return redirect('/profile')->with('informasi', 'Password tidak sesuai dengan konfirmasi password.');
    //         }
    //     } else {
    //         return redirect('/profile')->with('informasi', 'Password tidak sesuai.');
    //     }
    // }
}
