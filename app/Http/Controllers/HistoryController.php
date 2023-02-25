<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $search = Pembayaran::latest();
        if (request('search')) {
            $search->where('jumlah_bayar', 'like', '%' . request('search') . '%');
        }

        return view('admin.datahistory.index-history', [
            'datapembayaran' => $search->get(),
            'historypetugas' => Pembayaran::where('petugas_id', auth()->user()->id)->get()
        ]);
    }

    public function show($id)
    {
        return view('admin.datahistory.detail-history', [
            'datahistory' => Pembayaran::where('id', $id)->first()
        ]);
    }
}
