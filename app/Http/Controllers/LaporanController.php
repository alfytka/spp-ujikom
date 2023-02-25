<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        $petugas_id = $request->petugas_id;

        $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas'])->latest();

        if (request('petugas_id')) 
        {
            $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas'])->where('petugas_id', $petugas_id);
        } elseif (request('tanggal_awal'))
        {
            $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas'])->whereBetween('tgl_bayar', [$tanggal_awal, $tanggal_akhir]);
        }
        
        if (request('tanggal_awal')) {
            $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas'])->whereBetween('tgl_bayar', [$tanggal_awal, $tanggal_akhir])->where('petugas_id', $petugas_id)->latest();
        }

        return view('admin.laporan.index-laporan', [
            'datapetugas' => User::where('level', 'petugas')->orWhere('level', 'admin')->get(),
            'datalaporan' => $pembayaran->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        $petugas_id = $request->petugas_id;

        $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas'])->latest();

        if (request('petugas_id')) {
            $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas'])->where('petugas_id', $petugas_id);
        } 
        
        if (request('tanggal_awal')) {
            $pembayaran = Pembayaran::with(['userSiswa', 'userPetugas'])->whereBetween('tgl_bayar', [$tanggal_awal, $tanggal_akhir])->where('petugas_id', $petugas_id)->latest();
        }

        return view('admin.laporan.print-laporan', [
            'datapetugas' => User::where('level', 'petugas')->orWhere('level', 'admin')->first(),
            'datalaporan' => $pembayaran->get(),
            'petugas_id' => $petugas_id
        ]);
        

        // // $try = Pembayaran::where('petugas_id', $request->petugas_id)->orWhere('tgl_bayar', '=>', $tanggal_awal)->orWhere('tgl_bayar', '<=', $tanggal_akhir)->get();

        // $data = Pembayaran::where('petugas_id', $petugas)->where(function($query)use($tanggal_awal, $tanggal_akhir) {
        //     $query->where('tgl_bayar', '>=', $tanggal_awal)->here('tgl_bayar', '<=', $tanggal_akhir);
        // })->get();

        // return view('admin.laporan.index-laporan', [
        //     'datalaporan' => $data,
        //     'datapetugas' => User::where('level', 'petugas')->orWhere('level', 'admin')->get(),
        //     'old_tgl_awal' => $tanggal_awal,
        //     'old_tgl_akhir' => $tanggal_akhir
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
