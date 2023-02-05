@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle mb-0">
  <h5 class="fw-semibold">History Pembayaran</h5> 
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">

        <div class="cardxy shadow-sm">
            <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-9 text-end my-auto d-inline d-md-none d-lg-none">
                    <p class="mt-3 me-1 mb-0 fst-italic">Info history<i class="bi bi-clock-history ms-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Data diurutkan dari transaksi pembayaran terbaru ke terlama."></i></p>
                  </div>
                  <div class="col-12 col-md-4 pt-0 col-lg-3 my-auto">
                    <form action="{{ url()->current() }}" method="GET">
                      <div class="input-group">
                        <input type="text" name="search" value="{{ request('search') }}" class="mt-3 mb-4 mb-lg-0 mt-lg-3 mt-md-3 roundedx form-control form-control-sm" placeholder="Cari..." autocomplete="off">
                        <button class="btnxs btn-outline-navy rounded-r mt-3 mb-4 mb-lg-0 mt-lg-3 mt-md-3" type="submit"><i class="bi bi-search px-2 px-md-2 px-lg-1"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="col-12 col-md-8 col-lg-9 text-end my-auto d-none d-md-inline d-lg-inline">
                    <p class="mt-4 me-2 mb-3 fst-italic">Info history<i class="bi bi-clock-history ms-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Data diurutkan dari transaksi pembayaran terbaru ke terlama."></i></p>
                  </div>
                </div>

              <div class="table-responsive">
                <!-- Default Table -->
                {{-- @if ($datasiswa->count() > 0) --}}
                <table class="table table-sm mt-0 mt-lg-2">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Waktu Transaksi</th>
                      <th scope="col">Nama Petugas</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Tanggal Bayar</th>
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
                      <td>{{ $pembayaran->created_at }}</td>
                      <td>{{ $pembayaran->userPetugas->name }}</td>
                      <td>{{ $pembayaran->userSiswa->name }}</td>
                      <td>{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                      <td>{{ $pembayaran->tgl_bayar }}</td>
                      <td>{{ $pembayaran->jumlah_bayar }}</td>
                      <td>
                        <a href="/" class="btnxs btn-view"><i class="bi bi-view-list me-1"></i>Detail</a>
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



