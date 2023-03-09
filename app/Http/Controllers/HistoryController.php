<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $history = Pembayaran::where('status', 'sukses')->latest()->get();

        return view('admin.datahistory.index-history', [
            'datapembayaran' => $history,
        ]);
    }

    public function show($id, $idsiswa)
    {
        return view('admin.datahistory.detail-history', [
            'datahistory' => Pembayaran::where('id', $id)->first(),
            'datasiswa' => User::where('id', $id)->first(),
            'pembayarans' => Pembayaran::where('siswa_id', $idsiswa)->where('status', 'sukses')->orderBy('id', 'desc')->get(),
        ]);
    }
}
