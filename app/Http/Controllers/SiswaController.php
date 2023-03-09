<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Http\Requests\UpSiswaRequest;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\User;
use App\Notifications\PembayaranNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = User::where('level','siswa')->get();

        return view('admin.datasiswa.index-siswa', [
            'datasiswa' => $siswa,
            'datakelas' => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('admin'))
        {
            return view('admin.datasiswa.create-siswa', [
                'datakelas' => Kelas::all(),
                'dataspp' => Spp::all()
            ]);
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRequest $request)
    {
        $addSiswa = [
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'name' => $request->name,
            'kelas_id' => $request->kelas_id,
            'spp_id' => $request->spp_id,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'level' => $request->level
        ];
        
        User::create($addSiswa);
        return redirect(route('datasiswa.index'))->with('informasi' , 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = User::where('id', $id)->first();

        $siswa->notify(new PembayaranNotification);

        return view('admin.datasiswa.detail-siswa', [
            'datasiswa' => User::where('id', $id)->first(),
            'pembayaranterakhir' => Pembayaran::where('siswa_id', $id)->where('status', 'sukses')->orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('admin'))
        {
            return view('admin.datasiswa.edit-siswa', [
                'datasiswa' => User::where('id', $id)->first(),
                'datakelas' => Kelas::all(),
                'dataspp' => Spp::all()
            ]);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpSiswaRequest $request, $id)
    {
        if (!$request->password) 
        {
            $upSiswa = [
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'name' => $request->name,
                'kelas_id' => $request->kelas_id,
                'spp_id' => $request->spp_id,
                'email' => $request->email,
                'username' => $request->username,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'level' => $request->level
            ];
            User::find($id)->update($upSiswa);
        } else {
            $upSiswaWithPassword = [
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'name' => $request->name,
                'kelas_id' => $request->kelas_id,
                'spp_id' => $request->spp_id,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'level' => $request->level
            ];
            User::find($id)->update($upSiswaWithPassword);
        }

        return redirect(route('datasiswa.index'))->with('informasi', 'Data siswa berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect(route('datasiswa.index'))->with('informasi', 'Data siswa berhasil dihapus.');
    }

    public function uploadPhoto($id)
    {
        if (Gate::allows('admin'))
        {
            return view('admin.datasiswa.upload-photo', [
                'datasiswa' => User::where('id', $id)->first(),
            ]);
        }
        return back();
    }

    public function sendPhoto(Request $request, $id)
    {
        $request->validate([
            'foto' => 'required'
        ]);

        $foto = $request->file('foto');
        $extension = $foto->getClientOriginalExtension();
            $fileName = 'siswa-pic' . time(). '.' . $extension;
            $foto->move(public_path('/img/photo-siswa'), $fileName);
            $pic = public_path('/img/photo-siswa/' . $request->pic);
            File::delete($pic);
            User::where('id', $id)->update([
                'foto' => $fileName
            ]);
        
        return redirect('/datasiswa/' . $request->siswa_id)->with('informasi', 'Foto siswa berhasil diunggah.');
    }

}
