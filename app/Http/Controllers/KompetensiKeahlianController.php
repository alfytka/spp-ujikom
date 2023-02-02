<?php

namespace App\Http\Controllers;

use App\Http\Requests\KompetensiKeahlianRequest;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;

class KompetensiKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = Kompetensikeahlian::orderBy('created_at')->latest();
        if(request('search')) {
            $search->where('name', 'like', '%' . request('search') . '%')->orWhere('keterangan', 'like', '%' . request('search') . '%');
        };
        return view('admin.dataprodi.index-prodi', [
            'dataprodi' => $search->paginate(10)
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
    public function store(KompetensiKeahlianRequest $request)
    {
        Kompetensikeahlian::create($request->all());
        return redirect(route('dataprodi.index'))->with('informasi', 'data kompetensi keahlian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.dataprodi.edit-prodi', [
            'dataprodi' => Kompetensikeahlian::where('id', $id)->first(),
            'prodidata' => Kompetensikeahlian::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $upProdi = [
            'name' => $request->name,
            'keterangan' => $request->keterangan
        ];

        $this->validate($request,[
            'name' => 'required|max:255',
            'keterangan' => 'required|max:50'
        ]);
        
        Kompetensikeahlian::where('id', $id)->update($upProdi);
        return redirect('/dataprodi')->with('informasi', 'data kompetensi keahlian berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kompetensikeahlian::where('id', $id)->delete();
        return redirect('/dataprodi')->with('informasi', 'data kompetensi keahlian berhasil dihapus.');
    }
}
