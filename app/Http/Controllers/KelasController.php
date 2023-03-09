<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Http\Requests\UpKelasRequest;
use App\Models\Kelas;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KelasController extends Controller
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
            $kelas = Kelas::all();
            
            return view('admin.datakelas.index-kelas', [
                'datakelas' => $kelas,
                'dataprodi' => Kompetensikeahlian::all()
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
    public function store(KelasRequest $request)
    {
        Kelas::create($request->all());
        return redirect(route('datakelas.index'))->with('informasi', 'Data kelas berhasil ditambahkan.');
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
            return view('admin.datakelas.edit-kelas', [
                'datakelas' => Kelas::where('id', $id)->first(),
                'previewkelas' => Kelas::all(),
                'dataprodi' => Kompetensikeahlian::all()
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpKelasRequest $request, $id)
    {
        Kelas::find($id)->update($request->all());
        return redirect(route('datakelas.index'))->with('informasi', 'Data kelas berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();
        return redirect(route('datakelas.index'))->with('informasi', 'Data kelas berhasil dihapus.');
    }
}
