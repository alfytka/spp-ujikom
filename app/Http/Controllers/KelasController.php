<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use App\Models\Kompetensikeahlian;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = Kelas::orderBy('created_at')->latest();
        if (request('search')) {
            $search->where('kelas', 'like', '%' . request('search') . '%');
        } 

        $filter = Kompetensikeahlian::orderBy('created_at')->latest();
        if (request('filter')) {
            $filter->where('keterangan', 'like', '%' . request('filter') . '%');
        }

        return view('admin.datakelas.index-kelas', [
            'datakelas' => $search->paginate(10),
            'dataprodi' => $filter->paginate(5)
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
    public function store(KelasRequest $request)
    {
        Kelas::create($request->all());
        return redirect(route('datakelas.index'))->with('informasi', 'data kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.datakelas.edit-kelas', [
            'datakelas' => Kelas::where('id', $id)->first(),
            'previewkelas' => Kelas::all(),
            'dataprodi' => Kompetensikeahlian::all()
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
        //
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
        $upKelas = [
            'kelas' => $request->kelas,
            'kompetensikeahlian_id' => $request->kompetensikeahlian_id
        ];

        $this->validate($request, [
            'kelas' => 'required|string|max:255',
            'kompetensikeahlian_id' => 'required|string'
        ]);

        Kelas::where('id', $id)->update($upKelas);
        return redirect(route('datakelas.index'))->with('informasi', 'data kelas berhasil diubah.');
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
        return redirect(route('datakelas.index'))->with('informasi', 'data kelas berhasil dihapus.');
    }
}
