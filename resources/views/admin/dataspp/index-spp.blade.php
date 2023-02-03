@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold">Data SPP</h5>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">

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
                  <div class="col-12 col-md-8 col-lg-8">
                    <h6 class="card-title">Data SPP</h6>
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

              <!-- Default Table -->
              <div class="table-responsive">
                <table class="table table-sm mt-lg-2">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tahun SPP</th>
                      <th scope="col">Nominal Bayar</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    @foreach ($dataspp as $spp)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $spp->tahun }}</td>
                      <td>{{ $spp->nominal }}</td>
                      <td>
                        <a href="/dataspp/{{ $spp->id }}" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="/dataspp/{{ $spp->id }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data SPP?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- End Default Table Example -->
            </div>
          </div>

      <!-- <div class="row">

      </div> -->
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-plus-lg"></i> Tambah Data SPP</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/dataspp" method="POST">
            @csrf
            <div class="col-12">
              <label for="tahun" class="form-label">Tahun SPP</label>
              <input type="text" name="tahun" class="form-control form-control-smx roundedx @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}" placeholder="ex: 2023" id="tahun" autocomplete="off">
              @error('tahun')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="nominal" class="form-label mb-">Nominal</label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="text" name="nominal" class="form-control form-control-smx @error('nominal') is-invalid @enderror" value="{{ old('nominal') }}" placeholder="1000000" id="nominal" autocomplete="off">
                @error('nominal')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror

              </div>
            </div>
            <div class="text-end">
              <button type="submit" class="btnn btn-violet py-2 px-4 mt-1 mb-3">Simpan</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>

    </div><!-- End Right side columns -->

  </div>
</section>

@endsection



