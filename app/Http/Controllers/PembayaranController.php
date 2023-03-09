<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntriRequest;
use App\Http\Requests\UpPembayaranRequest;
use App\Http\Requests\UpStatusRequest;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Sekolah;
use App\Models\Spp;
use App\Models\User;
use App\Notifications\PembayaranNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::latest()->get();

        return view('admin.datapembayaran.index-pembayaran', [
            'semuapembayaran' => $pembayaran,
            'pembayaranpetugas' => Pembayaran::where('petugas_id', auth()->user()->id)->latest()->get(),
            'siswa' => Pembayaran::where('jenis_pembayaran', 'siswa')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kelas = $request->kelas;
        $nameSiswa = $request->siswa;

        $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        $siswa = User::where('level', 'siswa')->latest();
        if (request('kelas'))
        {
            $siswa->where('kelas_id', $kelas);
        }

        return view('admin.datapembayaran.entri-pembayaran', [
            'datakelas' => Kelas::all(),
            'datasiswa' => $siswa->get(),
            'siswas' => $nameSiswa,
            'bulans' => $bulan
        ]);
    }

    public function idSiswa($id)
    {
        $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $bulans = Pembayaran::where('siswa_id', $id)->where('status', 'sukses')->pluck('bulan_bayar');

        return view('admin.datapembayaran.entri-getsiswa', [
            'datakelas' => Kelas::all(),
            'datasiswa' => User::where('id', $id)->first(),
            'siswas' => User::where('level', 'siswa')->get(),
            'pembayarans' => Pembayaran::where('siswa_id', $id)->where('status', 'sukses')->orderBy('id', 'desc')->get(),
            'bulans' => $bulan,
            'disabledm' => $bulans->toArray()
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
        $add = [
            'petugas_id' => $request->petugas_id,
            'siswa_id' => $request->siswa_id,
            'tgl_bayar' => $request->tgl_bayar,
            'bulan_bayar' => $request->bulan_bayar,
            'tahun_bayar' => $request->tahun_bayar,
            'jumlah_bayar' => str_replace('.', '', $request->jumlah_bayar),
        ];

        Pembayaran::create($add);
        // $add->notify(new PembayaranNotification);
        // Notification::route('nexmo', '628567582541')->notify(new SmsNotification);
        return redirect(route('datapembayaran.index'))->with('informasi', 'Pembayaran berhasil.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $idsiswa)
    {
        return view('admin.datapembayaran.detail-pembayaran', [
            'pembayaran' => Pembayaran::where('id', $id)->first(),
            'datasiswa' => User::where('id', $id)->first(),
            'pembayarans' => Pembayaran::where('siswa_id', $idsiswa)->where('status', 'sukses')->orderBy('id', 'desc')->get(),
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
        $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        return view('admin.datapembayaran.edit-pembayaran', [
            'datakelas' => Kelas::all(),
            'datasiswa' => User::where('id', $id)->first(),
            'siswas' => User::where('level', 'siswa')->get(),
            'datapembayaran' => Pembayaran::where('id', $id)->first(),
            'bulans' => $bulan
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
        $add = [
            // 'siswa_id' => $request->siswa_id,
            'tgl_bayar' => $request->tgl_bayar,
            'bulan_bayar' => $request->bulan_bayar,
            'tahun_bayar' => $request->tahun_bayar,
            'jumlah_bayar' => str_replace('.', '', $request->jumlah_bayar)
        ];

        Pembayaran::find($id)->update($add);
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
        Pembayaran::where('id', $id)->delete();
        return redirect(route('datapembayaran.index'))->with('informasi', 'Data pembayaran berhasil dihapus.');
    }

    public function prosesPembayaran($id)
    {
        $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $metode_pembayaran = ['Transfer Bank - BRI','Transfer Bank - MANDIRI','Transfer Bank - BCA','Transfer Bank - BJB','GOPAY','OVO','DANA','Lainnya'];

        return view('admin.datapembayaran.proses-pembayaran', [
            'datakelas' => Kelas::all(),
            'datasiswa' => User::where('id', $id)->first(),
            'siswas' => User::where('level', 'siswa')->get(),
            'datapembayaran' => Pembayaran::where('id', $id)->first(),
            'bulans' => $bulan,
            'metode_pembayaran' => $metode_pembayaran
        ]);
    }

    public function updateProses(UpStatusRequest $request, $id)
    {
        if (!$request->petugas_id)
        {
            Pembayaran::find($id)->update([
                'tgl_bayar' => $request->tgl_bayar,
                'bulan_bayar' => $request->bulan_bayar,
                'tahun_bayar' => $request->tahun_bayar,
                'jumlah_bayar' => str_replace('.', '', $request->jumlah_bayar),
                'status' => $request->status
            ]);
        } else {
            Pembayaran::find($id)->update([
                'petugas_id' => $request->petugas_id,
                'tgl_bayar' => $request->tgl_bayar,
                'bulan_bayar' => $request->bulan_bayar,
                'tahun_bayar' => $request->tahun_bayar,
                'jumlah_bayar' => str_replace('.', '', $request->jumlah_bayar),
                'status' => $request->status
            ]);
        }

        return redirect(route('datapembayaran.index'))->with('informasi', 'Data pembayaran dari siswa telah diproses, status: ');
    }

    public function editPembayaranBySiswa($id)
    {
        $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $metode_pembayaran = ['Transfer Bank - BRI','Transfer Bank - MANDIRI','Transfer Bank - BCA','Transfer Bank - BJB','GOPAY','OVO','DANA','Lainnya'];

        return view('admin.datapembayaran.edit-pembayaranbysiswa', [
            'datasiswa' => User::where('id', $id)->first(),
            'siswas' => User::where('level', 'siswa')->get(),
            'datapembayaran' => Pembayaran::where('id', $id)->first(),
            'bulans' => $bulan,
            'metode_pembayaran' => $metode_pembayaran
        ]);
    }

    public function printPembayaran($id)
    {
        return view('admin.datapembayaran.print-pembayaran', [
            'detailpembayaran' => Pembayaran::where('id', $id)->first(),
            'sekolah' => Sekolah::first()
        ]);
    }
}
