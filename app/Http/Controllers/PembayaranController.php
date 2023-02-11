<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntriRequest;
use App\Http\Requests\UpPembayaranRequest;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = Pembayaran::orderBy('created_at')->latest();
        if (request('search')) {
            $search->where('jumlah_bayar', 'like', '%' . request('search') . '%');
        }

        return view('admin.datapembayaran.index-pembayaran', [
            'datapembayaran' => $search->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.datapembayaran.entri-pembayaran', [
            'datakelas' => Kelas::all(),
            // 'datasiswa' => User::where('level', 'siswa')->get()
        ]);
    }

    public function getKelas(Request $request)
    {
        $getKelas = $request->kelas;
        $getSiswa = $request->name;

        return view('admin.datapembayaran.get-kelas', [
            'datasiswa' => User::where('kelas_id', $getKelas)->get(),
            'datakelas' => Kelas::all(),
            'getsiswa' => $getSiswa,
            'kelasx' => $getKelas
        ]);
    }

    public function getSiswa(Request $request)
    {
        $getSiswa = $request->name;
        $getKelas = $request->kelas;

        return view('admin.datapembayaran.get-siswa', [
            'datasiswa' => User::where('kelas_id', $getKelas)->get(),
            'datakelas' => Kelas::all(),
            'detailsiswa' => User::where('kelas_id', $getSiswa),
            'getsiswa' => $getSiswa,
            'kelasx' => $getKelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntriRequest $request)
    {
        Pembayaran::create($request->all());
        return redirect(route('datapembayaran.index'))->with('informasi', 'Pembayaran berhasil.');
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
        return view('admin.datapembayaran.edit-pembayaran', [
            'datapembayaran' => Pembayaran::where('id', $id)->first(),
            'datasiswa' => User::where('level', 'siswa')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpPembayaranRequest $request, $id)
    {
        Pembayaran::find($id)->update($request->all());
        return redirect(route('datapembayaran.index'))->with('informasi', 'Data pembayaran berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
