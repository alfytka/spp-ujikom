@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Laporan Pembayaran</title>
@endsection
@section('content')
  
<div class="pagetitle mb-0">
  <h5 class="fw-semibold">Laporan</h5> 
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">

        <div class="cardxy shadow-sm">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-12 col-lg-12 d-flex justify-content-between">
                  <h6 class="card-title ms-1">Generate Laporan</h6>
                  <a href="/laporan" class="float-end my-auto me-1 text-decoration-underline"><i class="bi bi-arrow-counterclockwise me-2"></i>Reset filter</a>
                </div>
              </div>

              <form action="{{ route('laporan.index') }}" method="GET">
                @csrf
                <div class="row px-1 mb-2">
                  <div class="col-12 col-md-4 col-lg-4 mb-2 mb-md-0">
                    <div class="input-group">
                      <span class="input-group-text span-for-select">Nama Petugas</span>
                      <select class="form-select form-select-smx roundedx" name="petugas_id" id="name">
                        <option disabled value>- Pilih petugas -</option>
                        @foreach ($datapetugas as $petugas)
                          <option disabled hidden selected>- Pilih petugas -</option>
                          <option value="{{ $petugas->id }}" {{ $petugas->id == request('petugas_id') ? 'selected' : '' }}>{{ $petugas->name }} - {{ $petugas->level }}</option>
                        @endforeach
                      </select>
                      @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12 col-md-4 col-lg-4 mb-2 mb-md-0">
                    <div class="input-group">
                      <span class="input-group-text span-for-select">Dari Tanggal</span>
                      <input type="date" name="tanggal_awal" value="{{ old('tanggal_awal') }}" class="form-control form-control-smx roundedx">
                      @error('tanggal_awal')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12 col-md-4 col-lg-4 mb-2 mb-md-0">
                    <div class="input-group">
                      <span class="input-group-text span-for-select">Sampai Tanggal</span>
                      <input type="date" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" class="form-control form-control-smx roundedx">
                      @error('tanggal_akhir')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
  
                <div class="row px-1">
                  <div class="col-12 text-end d-flex flex-row-reverse justify-content-between">
                    <button class="btnn btn-violet py-2 px-3 ms-2 mt-0 mt-md-1" type="submit"> Generate</button>
                  </form>
                  <form action="/laporan/create" method="GET">
                    @csrf 
                    <input type="hidden" name="petugas_id" value="{{ request('petugas_id') }}">
                    <input type="hidden" name="tanggal_awal" value="{{ request('tanggal_awal') }}">
                    <input type="hidden" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
                    <button class="btnn btn-ol-violet py-2 px-3 mt-0 mt-md-1" type="submit">Cetak Laporan</button>
                  </form>
                  </div>
                </div>

                <div class="border-dash-zinc text-blue mt-2"></div>


              <div class="table-responsive mt-3 mt-md-2 mt-lg-2">
                <!-- Default Table -->
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Waktu Transaksi</th>
                      <th scope="col">Nama Petugas</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Tanggal Bayar</th>
                      <th scope="col">Jumlah Bayar</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    @foreach ($datalaporan as $pembayaran)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $pembayaran->created_at }}</td>
                      <td>{{ $pembayaran->jenis_pembayaran == 'petugas' ? $pembayaran->userPetugas->name : '-' }}</td>
                      <td>{{ $pembayaran->userSiswa->name }}</td>
                      <td>{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                      <td>{{ $pembayaran->tgl_bayar }}</td>
                      <td>{{ $pembayaran->jumlah_bayar }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                
                <!-- End Default Table Example -->
              </div>
            </div>
          </div>

      <!-- <div class="row">

      </div> -->
    </div><!-- End Left side columns -->

    <!-- Right side columns -->

  </div>

</section>

@endsection
