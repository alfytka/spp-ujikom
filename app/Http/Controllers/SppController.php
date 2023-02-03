<?php

namespace App\Http\Controllers;

use App\Http\Requests\SppRequest;
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = Spp::orderBy('created_at')->latest();
        if (request('search')) {
            $search->where('tahun', 'like', '%' . request('search') . '%')->orWhere('nominal', 'like', '%' . request('search') . '%');
        }

        return view('admin.dataspp.index-spp', [
            'dataspp' => $search->paginate(10)
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
    public function store(SppRequest $request)
    {
        Spp::create($request->all());
        return redirect(route('dataspp.index'))->with('informasi', 'Data SPP berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.dataspp.edit-spp', [
            'dataspp' => Spp::where('id', $id)->first(),
            'previewspp' => Spp::all()
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
        $upSpp = [
            'tahun' => $request->tahun,
            'nominal' => $request->nominal
        ];
        $this->validate($request, [
            'tahun' => 'required|string',
            'nominal' => 'required'
        ]);

        Spp::where('id', $id)->update($upSpp);
        return redirect(route('dataspp.index'))->with('informasi', 'Data SPP berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Spp::where('id', $id)->delete();
        return redirect(route('dataspp.index'))->with('informasi', 'Data SPP berhasil dihapus.');
    }
}
