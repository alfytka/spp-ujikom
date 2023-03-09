<?php

namespace App\Http\Controllers;

use App\Http\Requests\KompetensiKeahlianRequest;
use App\Http\Requests\UpProdiRequest;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KompetensiKeahlianController extends Controller
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
            $prodi = Kompetensikeahlian::all();
            
            return view('admin.dataprodi.index-prodi', [
                'dataprodi' => $prodi
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
    public function store(KompetensiKeahlianRequest $request)
    {
        Kompetensikeahlian::create($request->all());
        return redirect(route('dataprodi.index'))->with('informasi', 'Data kompetensi keahlian berhasil ditambahkan.');
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
        if (Gate::allows('admin'))
        {
            return view('admin.dataprodi.edit-prodi', [
                'dataprodi' => Kompetensikeahlian::where('id', $id)->first(),
                'prodidata' => Kompetensikeahlian::all()
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
    public function update(UpProdiRequest $request, $id)
    {
        Kompetensikeahlian::find($id)->update($request->all());
        return redirect(route('dataprodi.index'))->with('informasi', 'Data kompetensi keahlian berhasil diubah.');
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
        return redirect(route('dataprodi.index'))->with('informasi', 'Data kompetensi keahlian berhasil dihapus.');
    }
}
