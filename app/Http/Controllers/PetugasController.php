<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetugasRequest;
use App\Http\Requests\UpPetugasRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = User::where('level', 'petugas');
        if (request('search')) {
            $search->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('username', 'like', '%' . request('search') . '%')
            ->orWhere('email', 'like', '%' . request('search') . '%')
            ->orWhere('telepon', 'like', '%' . request('search') . '%');
        }

        return view('admin.datapetugas.index-petugas', [
            'datapetugas' => $search->paginate(10),
        ]);
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
        User::create($request->all());
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
        return view('admin.datapetugas.detail-petugas', [
            'datapetugas' => User::where('id', $id)->first()
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
        return view('admin.datapetugas.edit-petugas', [
            'datapetugas' => User::where('id', $id)->first()
        ]);
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
}
