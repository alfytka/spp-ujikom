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
                {{-- <div class="row">
                  <div class="col-12 col-md-8 col-lg-9 text-end my-auto d-none d-md-inline d-lg-inline">
                    <p class="mt-4 me-2 mb-3 fst-italic">Info history<i class="bi bi-clock-history ms-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Data diurutkan dari transaksi pembayaran terbaru ke terlama."></i></p>
                  </div>
                </div> --}}

              <div class="table-responsive mt-4 mt-md-3 mt-lg-3">
                <!-- Default Table -->
                <table class="table table-sm" id="table1">
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



