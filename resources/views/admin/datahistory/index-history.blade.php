@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Riwayat Pembayaran</title>
@endsection
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
                  {{-- <div class="col-12 col-md-8 col-lg-9 text-end my-auto d-none d-md-inline d-lg-inline">
                    <p class="mt-4 me-2 mb-3 fst-italic">Info history<i class="bi bi-clock-history ms-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Data diurutkan dari transaksi pembayaran terbaru ke terlama."></i></p>
                  </div> --}}
                  <div class="col-12 col-md-8 col-lg-8">
                    <ul class="nav nav-tabs nav-tabs-bordered mt-3 float-center float-md-start">

                      <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#riwayat_saya">History saya</button>
                      </li>
      
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#semua">Semua</button>
                      </li>
      
                    </ul>
                  </div>
                  <div class="col-12 mt-2 mb- mx-auto border-bottom"></div>
                </div>

                <div class="tab-content">

                  <div class="tab-pane fade show active" id="riwayat_saya">
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
                            <th scope="col">Nominal</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="align-middle">
                          @foreach ($historypetugas as $pembayaran)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $pembayaran->created_at }}</td>
                            <td>
                              {{ $pembayaran->jenis_pembayaran == 'petugas' ? $pembayaran->userPetugas->name : '' }}
                            </td>
                            <td>{{ $pembayaran->userSiswa->name }}</td>
                            <td>{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                            <td>{{ $pembayaran->tgl_bayar }}</td>
                            <td>Rp{{ number_format($pembayaran->jumlah_bayar, 0, '.', '.') }}</td>
                            <td>
                              <a href="/history/{{ $pembayaran->id }}" class="btnxs btn-view"><i class="bi bi-view-list me-1"></i>Detail</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      
                      <!-- End Default Table Example -->
                    </div>
                  </div>

                  <div class="tab-pane fade" id="semua">
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
                            <th scope="col">Nominal</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="align-middle">
                          @foreach ($datapembayaran as $pembayaran)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $pembayaran->created_at }}</td>
                            <td>
                              {{ $pembayaran->jenis_pembayaran == 'petugas' ? $pembayaran->userPetugas->name : '' }}
                            </td>
                            <td>{{ $pembayaran->userSiswa->name }}</td>
                            <td>{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                            <td>{{ $pembayaran->tgl_bayar }}</td>
                            <td>Rp{{ number_format($pembayaran->jumlah_bayar, 0, '.', '.') }}</td>
                            <td>
                              <a href="/history/{{ $pembayaran->id }}" class="btnxs btn-view"><i class="bi bi-view-list me-1"></i>Detail</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      
                      <!-- End Default Table Example -->
                    </div>
                  </div>
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

@section('my-js')
  <script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/vendor/extensions/simple-datatables.js"></script>
@endsection

