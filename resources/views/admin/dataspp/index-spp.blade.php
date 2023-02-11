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

              <!-- Default Table -->
              <div class="table-responsive mt-4 mt-md-3 mt-lg-3">
                <table class="table table-sm" id="table1">
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
                        <div class="dropdown">
                          <button type="button" class="btnxs btn-view" data-bs-toggle="dropdown"><i class="bi bi-view-list"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="/dataspp/{{ $spp->id }}" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                            <li>
                              <form action="/dataspp/{{ $spp->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus data spp?')" class="dropdown-item">Hapus <i class="bi bi-x-lg float-end"></i></button>
                              </form>
                            </li>
                          </ul>
                        </div>
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
              <label for="tahun" class="form-label mb-1">Tahun SPP</label>
              <input type="text" name="tahun" class="form-control form-control-smx roundedx @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}" placeholder="ex: 2023" id="tahun" autocomplete="off">
              @error('tahun')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="nominal" class="form-label mb-1">Nominal</label>
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



