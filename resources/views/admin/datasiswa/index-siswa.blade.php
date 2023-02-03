@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle mb-0">
  <div class="row">
    <div class="col-7">
      <h5 class="fw-semibold">Data Siswa</h5> 
    </div>
    <div class="col-5 text-end d-inline d-md-none d-lg-none">
      <a href="{{ route('datasiswa.create') }}" type="button" class="btnn btn-ol-violet py-2 px-3 add"><i class="bi bi-plus-lg pe-1"></i> Siswa</a>
    </div>
  </div>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-11">

      @if (session()->has('informasi'))
      <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
        <span><b>Berhasil. </b>{{ session('informasi') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif 

        <div class="cardxy shadow-sm">
            <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8 my-auto d-none d-md-inline d-lg-inline">
                    <a href="{{ route('datasiswa.create') }}" type="submit" class="btnn btn-ol-violet roundeds py-2 px-3 mt-3 mb-2 mb-lg-0"><i class="bi bi-plus-lg pe-1"></i> Data Siswa</a>
                  </div>
                  <div class="col-12 col-md-8 col-lg-8 my-auto d-inline d-md-none d-lg-none">
                    <h6 class="card-title">Data Siswa</h6>
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
                <table class="table table-sm mt-lg-2">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">NISN</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Tahun SPP</th>
                      <th scope="col">Nominal SPP</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    {{-- @foreach ($dataprodi as $prodi) --}}
                    <tr>
                      <th scope="row">1</th>
                      <td>3157839204</td>
                      <td>Alfitka Haerul Kurniawan</td>
                      <td>XII RPL 1</td>
                      <td>2023</td>
                      <td>Rp800.000</td>
                      <td>
                        <a href="#" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="#" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="$" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>3157839204</td>
                      <td>Alfitka Haerul Kurniawan</td>
                      <td>XII RPL 1</td>
                      <td>2023</td>
                      <td>Rp800.000</td>
                      <td>
                        <a href="#" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="#" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="$" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>3157839204</td>
                      <td>Alfitka Haerul Kurniawan</td>
                      <td>XII RPL 1</td>
                      <td>2023</td>
                      <td>Rp800.000</td>
                      <td>
                        <a href="#" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="#" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="$" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>3157839204</td>
                      <td>Alfitka Haerul Kurniawan</td>
                      <td>XII RPL 1</td>
                      <td>2023</td>
                      <td>Rp800.000</td>
                      <td>
                        <a href="#" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="#" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="$" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>3157839204</td>
                      <td>Alfitka Haerul Kurniawan</td>
                      <td>XII RPL 1</td>
                      <td>2023</td>
                      <td>Rp800.000</td>
                      <td>
                        <a href="#" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="#" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="$" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    {{-- @endforeach --}}
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

  <div class="row">
    <div class="col-lg-4">

      

    </div><!-- End Right side columns -->
  </div>
</section>

@endsection
