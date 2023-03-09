<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetugasRequest;
use App\Http\Requests\UpPetugasRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin'))
        {
            $petugas = User::where('level', 'petugas')->get();
    
            return view('admin.datapetugas.index-petugas', [
                'datapetugas' => $petugas
            ]);
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetugasRequest $request)
    {
        $add = [
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'level' => $request->level
        ];

        User::create($add);
        return redirect(route('datapetugas.index'))->with('informasi', 'Data petugas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::allows('admin'))
        {
            return view('admin.datapetugas.detail-petugas', [
                'datapetugas' => User::where('id', $id)->first()
            ]);
        }
        return back();
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
            return view('admin.datapetugas.edit-petugas', [
                'datapetugas' => User::where('id', $id)->first()
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
    public function update(UpPetugasRequest $request, $id)
    {
        if (!$request->password) {
            $upPetugas = [
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'level' => $request->level
            ];
            User::find($id)->update($upPetugas);
        } else {
            $upPetugasWithPassword = [
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'level' => $request->level
            ];
            User::find($id)->update($upPetugasWithPassword);
        }

        return redirect(route('datapetugas.index'))->with('informasi', 'Data petugas berhasil diubah.');
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
        return redirect(route('datapetugas.index'))->with('informasi', 'Data petugas berhasil dihapus.');
    }

    public function uploadPhoto($id)
    {
        if (Gate::allows('admin'))
        {
            return view('admin.datapetugas.upload-photo', [
                'datapetugas' => User::where('id', $id)->first(),
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
            $fileName = 'petugas-pic' . time(). '.' . $extension;
            $foto->move(public_path('/img/photo-petugas'), $fileName);
            $pic = public_path('/img/photo-petugas/' . $request->pic);
            File::delete($pic);
            User::where('id', $id)->update([
                'foto' => $fileName
            ]);
        
        return redirect('/datapetugas/' . $request->petugas_id)->with('informasi', 'Foto petugas berhasil diunggah.');
    }
}
