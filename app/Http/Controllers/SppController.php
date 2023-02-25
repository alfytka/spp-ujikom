<?php

namespace App\Http\Controllers;

use App\Http\Requests\SppRequest;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SppController extends Controller
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
            $search = Spp::orderBy('created_at')->latest();
            if (request('search')) {
                $search->where('tahun', 'like', '%' . request('search') . '%')->orWhere('nominal', 'like', '%' . request('search') . '%');
            }
    
            return view('admin.dataspp.index-spp', [
                'dataspp' => $search->get()
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
    public function store(SppRequest $request)
    {
        $data = [
            'tahun' => $request->tahun,
            'nominal' => str_replace('.', '', $request->nominal)
        ];
        
        Spp::create($data);
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
        if (Gate::allows('admin'))
        {
            return view('admin.dataspp.edit-spp', [
                'dataspp' => Spp::where('id', $id)->first(),
                'previewspp' => Spp::all()
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
    public function update(SppRequest $request, $id)
    {
        $data = [
            'tahun' => $request->tahun,
            'nominal' => str_replace('.', '', $request->nominal)
        ];

        Spp::where('id', $id)->update($data);
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
