<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Http\Requests\UpSiswaRequest;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = User::where('level','siswa');
        if (request('search')) {
            $search->where('nisn', 'like', '%' . request('search') . '%')
            ->orWhere('nis', 'like', '%' . request('search') . '%')
            ->orWhere('name', 'like', '%' . request('search') . '%')
            ->orWhere('username', 'like', '%' . request('search') . '%')
            ->orWhere('email', 'like', '%' . request('search') . '%');
        }

        return view('admin.datasiswa.index-siswa', [
            'datasiswa' => $search->paginate(10),
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
        return view('admin.datasiswa.create-siswa', [
            'datakelas' => Kelas::all(),
            'dataspp' => Spp::all()
        ]);
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
        return view('admin.datasiswa.detail-siswa', [
            'datasiswa' => User::where('id', $id)->first()
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
        return view('admin.datasiswa.edit-siswa', [
            'datasiswa' => User::where('id', $id)->first(),
            'datakelas' => Kelas::all(),
            'dataspp' => Spp::all()
        ]);
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
        if (!$request->password) {
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
}
