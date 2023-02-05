@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle mb-0">
  <div class="row">
    <div class="col-7">
      <h5 class="fw-semibold">Data Pembayaran</h5> 
    </div>
    <div class="col-5 text-end d-inline d-md-none d-lg-none">
      <a href="{{ route('datapembayaran.create') }}" type="button" class="btnn btn-ol-violet py-2 px-3 add"> Pembayaran</a>
    </div>
  </div>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">

      @if (session()->has('informasi'))
      <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
        <span><b>Berhasil - </b>{{ session('informasi') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif 

        <div class="cardxy shadow-sm">
            <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8 my-auto d-none d-md-inline d-lg-inline">
                    <a href="{{ route('datapembayaran.create') }}" type="submit" class="btnn btn-ol-violet roundeds py-2 px-3 mt-3 mb-2 mb-lg-0">Entri Pembayaran</a>
                  </div>
                  <div class="col-12 col-md-8 col-lg-8 my-auto d-inline d-md-none d-lg-none">
                    <h6 class="card-title">Data Pembayaran</h6>
                  </div>
                  <div class="col-12 col-md-4 col-lg-4 my-auto">
                    <form action="{{ url()->current() }}" method="GET">
                      <div class="input-group">
                        <input type="text" name="search" value="{{ request('search') }}" class="mt-1 mb-3 mb-lg-0 mt-lg-3 mt-md-3 roundedx form-control form-control-sm" placeholder="Cari..." autocomplete="off">
                        <button class="btnxs btn-outline-navy rounded-r mt-1 mb-3 mb-lg-0 mt-lg-3 mt-md-3" type="submit"><i class="bi bi-search px-2 px-md-2 px-lg-1"></i></button>
                      </div>
                    </form>
                  </div>
                </div>

              <div class="table-responsive">
                <!-- Default Table -->
                {{-- @if ($datasiswa->count() > 0) --}}
                <table class="table table-sm mt-lg-2">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Petugas</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Tanggal Bayar</th>
                      <th scope="col">Tahun</th>
                      <th scope="col">Nominal</th>
                      <th scope="col">Jumlah Bayar</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    @foreach ($datapembayaran as $pembayaran)
                    <tr>
                      {{-- <th scope="row">1</th>
                      <td>Maman Suparman</td>
                      <td>Alfitka Haerul Kurniawan</td>
                      <td>XII RPL 1</td>
                      <td>10/10/2021</td>
                      <td>2022</td>
                      <td>Rp1.000.000</td>
                      <td>Rp200.000</td> --}}
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $pembayaran->userPetugas->name }}</td>
                      <td>{{ $pembayaran->userSiswa->name }}</td>
                      <td>{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                      <td>{{ $pembayaran->tgl_bayar }}</td>
                      <td>{{ $pembayaran->userSiswa->spp->tahun }}</td>
                      <td>{{ $pembayaran->userSiswa->spp->nominal }}</td>
                      <td>{{ $pembayaran->jumlah_bayar }}</td>
                      <td>
                        <a href="/" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="/datapembayaran//edit" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="/datapembayaran/" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data pembayaran?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- @else
                <div class="text-center mt-4 mb-4">
                  <i class="text-danger fs-1 bi bi-backspace"></i>
                  <h5 class="mt-1">Maaf, data tidak (<i class="bi bi-x"></i>) ditemukan.</h5>
                  <div class="mt-4">
                    <a href="{{ route('datasiswa.index') }}" class="fw-semibold"><i class="bi bi-arrow-return-left pe-1"></i> Tampilan awal</a>
                  </div>
                </div>
                @endif --}}
                
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


