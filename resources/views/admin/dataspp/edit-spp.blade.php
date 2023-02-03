@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold"><a href="{{ route('dataspp.index') }}" class="back-icon"><i class="bi bi-chevron-left back-icon"></i></a> <span class="ps-1">Data SPP</span></h5>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Right side columns -->
    <div class="col-lg-5">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h6 class="card-title"><i class="bi bi-cursor-text"></i> Ubah Data SPP</h6>

          <!-- Vertical Form -->
          <form class="row g-3" action="/dataspp/{{ $dataspp->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12 form-group">
              <label for="tahun" class="form-label">Tahun SPP</label>
              <input type="text" name="tahun" class="form-control form-control-smx roundedx @error('tahun') is-invalid @enderror" value="{{ $dataspp->tahun, old('tahun') }}" placeholder="ex: 2023" id="tahun" autocomplete="off">
              @error('tahun')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="nominal" class="form-label mb-">Nominal</label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="text" name="nominal" class="form-control form-control-smx @error('nominal') is-invalid @enderror" value="{{ $dataspp->nominal, old('nominal') }}" placeholder="1000000" id="nominal" autocomplete="off">
                @error('nominal')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror

              </div>
            </div>
            <div class="text-end">
              <button type="submit" class="btnn btn-violet py-2 px-4 mt-1 mb-3">Ubah</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>

    </div><!-- End Right side columns -->

    <!-- Left side columns -->
    <div class="col-lg-7">
        <div class="cardxy shadow-sm">
            <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8">
                    <h5 class="card-title">Preview Data SPP</h5>
                  </div>
                </div>

              <!-- Default Table -->
              <div class="table-responsive">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tahun SPP</th>
                      <th scope="col">Nominal</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    @foreach ($previewspp as $spp)
                      <tr class="{{ $spp->id == $dataspp->id ? 'table-blue' : '' }}">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $spp->tahun }}</td>
                        <td>{{ $spp->nominal }}</td>
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

  </div>
</section>

@endsection

