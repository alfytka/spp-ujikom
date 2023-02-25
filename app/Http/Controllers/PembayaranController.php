<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntriRequest;
use App\Http\Requests\UpPembayaranRequest;
use App\Http\Requests\UpStatusRequest;
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
        $search = Pembayaran::latest();
        if (request('search')) {
            $search->where('jumlah_bayar', 'like', '%' . request('search') . '%');
        }

        return view('admin.datapembayaran.index-pembayaran', [
            'semuapembayaran' => $search->get(),
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

        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

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
        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        return view('admin.datapembayaran.entri-getsiswa', [
            'datakelas' => Kelas::all(),
            'datasiswa' => User::where('id', $id)->first(),
            'siswas' => User::where('level', 'siswa')->get(),
            'pembayarans' => Pembayaran::where('siswa_id', $id)->latest()->get(),
            'bulans' => $bulan
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
            'pembayarans' => Pembayaran::where('siswa_id', $idsiswa)->get(),
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
        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        return view('admin.datapembayaran.edit-pembayaran', [
            'datakelas' => Kelas::all(),
            'datasiswa' => User::where('id', $id)->first(),
            'siswas' => User::where('level', 'siswa')->get(),
            'datapembayaran' => Pembayaran::where('id', $id)->first(),
            'bulans' => $bulan
        ]);

        // $getSiswa = $request->name;
        // $getKelas = $request->kelas;

        // $pembayaran = Pembayaran::where('id', $id)->first();

        // if (request('kelas_id')) {
        //     $pembayaran->userSiswa->where('kelas_id', 'like', '%' . request('kelas_id') . '%');
        // }
        
        // return view('admin.datapembayaran.edit-pembayaran', [
        //     'datapembayaran' => $pembayaran,
        //     'datasiswa' => User::where('kelas_id', $getKelas)->get(),
        //     'datakelas' => Kelas::all(),
        //     'detailsiswa' => User::where('kelas_id', $getSiswa),
        //     'getsiswa' => $getSiswa,
        //     'kelasx' => $getKelas
        // ]);
        
        // return view('admin.datapembayaran.edit-pembayaran', [
        //     'datapembayaran' => Pembayaran::where('id', $id)->first(),
        //     'datasiswa' => User::where('level', 'siswa')->get(),
        //     'datakelas' => Kelas::all()
        // ]);
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
        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        return view('admin.datapembayaran.proses-pembayaran', [
            'datakelas' => Kelas::all(),
            'datasiswa' => User::where('id', $id)->first(),
            'siswas' => User::where('level', 'siswa')->get(),
            'datapembayaran' => Pembayaran::where('id', $id)->first(),
            'bulans' => $bulan
        ]);
    }

    public function updateProses(UpStatusRequest $request, $id)
    {
        $add = [
            'petugas_id' => $request->petugas_id,
            'tgl_bayar' => $request->tgl_bayar,
            'bulan_bayar' => $request->bulan_bayar,
            'tahun_bayar' => $request->tahun_bayar,
            'jumlah_bayar' => str_replace('.', '', $request->jumlah_bayar),
            'status' => $request->status
        ];

        Pembayaran::find($id)->update($add);
        return redirect(route('datapembayaran.index'))->with('informasi', 'Data pembayaran dari siswa telah diproses, status: ');
    }
}
