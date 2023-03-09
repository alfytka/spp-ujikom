@extends('layouts.kerangka')
@section('titles')
  <title>SPP - History Pembayaran</title>
@endsection
@section('content')
  
<div class="pagetitle mb-0">
  <h5 class="fw-semibold">History Pembayaran</h5> 
</div>

<section class="section dashboard">
  <div class="row">
    <div class="col-lg-12">
      <div class="cardxy shadow-sm">
        <div class="card-body">

          <div class="row px-1 my-2">
            <div class="col-12 my-auto">
              <h6 class="card-title fs-10"><i class="bi bi-info-circle-fill me-1 text-blue"></i> Riwayat pembayaran siswa.</h6>
            </div>
          </div>

          <div class="border-dash-zinc"></div>
          
          <div class="table-responsive mt-2 mt-md-2 mt-lg-2">
            <table class="table table-sm" id="table1">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col"><i class="bi bi-clock me-1"></i> Transaksi</th>
                  <th scope="col">Petugas</th>
                  <th scope="col"><span class="d-none d-md-inline">Nama</span> Siswa</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Tanggal <span class="d-none d-md-inline">Bayar</span></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($datapembayaran as $pembayaran)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td style="min-width: 110px;">{{ $pembayaran->created_at }}</td>
                <td style="min-width: 120px;">
                  {{ $pembayaran->petugas_id == '' ? '-' : $pembayaran->userPetugas->name }}
                </td>
                <td style="min-width: 180px;" class="{{ $pembayaran->jenis_pembayaran == 'siswa' ? 'text-violet' : '' }}">{{ $pembayaran->userSiswa->name }}</td>
                <td style="min-width: 90px;">{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                <td>{{ $pembayaran->tgl_bayar }}</td>
                <td class="align-middle">
                  <a href="/history/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}" class="btnxs btn-violet"><i class="bi bi-text-wrap float-end"></i></a>
                  {{-- <div class="dropdown">
                    <button type="button" class="btnxs btn-white" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                    <ul class="dropdown-menu">
                      <li><a href="/history/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}" class="dropdown-item">Detail <i class="bi bi-eye float-end"></i></a></li>
                    </ul>
                  </div> --}}
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('my-js')
  <script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/vendor/extensions/simple-datatables.js"></script>
@endsection