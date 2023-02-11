@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle mb-0">
  <h5 class="fw-semibold">Data Pembayaran</h5> 
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
                  <div class="col-12 col-md-8 col-lg-8 my-auto">
                    <a href="{{ route('datapembayaran.create') }}" type="submit" class="btnn btn-ol-violet roundeds py-2 px-3 mt-3">Entri Pembayaran</a>
                  </div>
                  <div class="col-12 mt-2 mb-1 mx-auto border-bottom"></div>
                </div>


              <div class="table-responsive">
                <!-- Default Table -->
                <table class="table table-sm" id="table1">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col"><span class="d-none d-md-inline d-lg-inline">Nama</span> Petugas</th>
                      <th scope="col"><span class="d-none d-md-inline d-lg-inline">Nama</span> Siswa</th>
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
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $pembayaran->userPetugas->name }}</td>
                      <td>{{ $pembayaran->userSiswa->name }}</td>
                      <td>{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                      <td>{{ $pembayaran->tgl_bayar }}</td>
                      <td>{{ $pembayaran->userSiswa->spp->tahun }}</td>
                      <td>{{ $pembayaran->userSiswa->spp->nominal }}</td>
                      <td>{{ $pembayaran->jumlah_bayar }}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btnxs btn-view" data-bs-toggle="dropdown"><i class="bi bi-view-list"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="/datapembayaran/{{ $pembayaran->id }}/edit" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                            <li><a href="/datapembayaran/{{ $pembayaran->id }}" class="dropdown-item">Detail <i class="bi bi-eye float-end"></i></a></li>
                            <li>
                              <form action="/datapembayaran/{{ $pembayaran->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus data pembayaran?')" class="dropdown-item">Hapus <i class="bi bi-x-lg float-end"></i></button>
                              </form>
                            </li>
                          </ul>
                        </div>
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



