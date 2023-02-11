<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageSiswaController extends Controller
{
    public function profile()
    {
        return view('siswa.profile-siswa.profilesiswa');
    }

    public function editProfile()
    {
        return view('siswa.profile-siswa.edit-profilesiswa');
    }

    public function changePasswordSiswa()
    {
        return view('siswa.profile-siswa.changepassword-siswa');
    }
}
