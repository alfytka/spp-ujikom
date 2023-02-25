@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Edit Data Prodi</title>
@endsection
@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold"><a type="button" onclick="history.back()" class="back-icon"><i class="bi bi-chevron-left back-icon"></i></a> <span class="ps-1">Data Kompetensi Keahlian</span></h5>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Right side columns -->
    <div class="col-lg-5">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h6 class="card-title"><i class="bi bi-cursor-text"></i> Ubah Data Prodi</h6>

          <!-- Vertical Form -->
          <form class="row g-3" action="/dataprodi/{{ $dataprodi->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12 form-group">
              <label for="namaJurusan" class="form-label mb-1">Nama Jurusan</label>
              <input type="text" name="name" value="{{ $dataprodi->name, old('name') }}" class="form-control form-control-smx roundedx @error('name') is-invalid @enderror" placeholder="Nama jurusan" id="namaJurusan" autocomplete="off">
              @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="keterangan" class="form-label mb-1">Keterangan</label>
              <input type="text" name="keterangan" value="{{ $dataprodi->keterangan }}" class="form-control form-control-smx roundedx @error('keterangan') is-invalid @enderror" placeholder="Singkatan: RPL" id="keterangan" autocomplete="off">
              @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="text-end">
              <button type="submit" class="btnn btn-violet py-2 px-4 mt-1 mb-3">Simpan</button>
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
                    <h5 class="card-title">Preview Kompetensi Keahlian</h5>
                  </div>
                </div>

              <!-- Default Table -->
              <div class="table-responsive">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Jurusan</th>
                      <th scope="col">Keterangan</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    @foreach ($prodidata as $prodi)
                      <tr class="{{ $prodi->id == $dataprodi->id ? 'table-blue' : '' }}">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $prodi->name }}</td>
                        <td>{{ $prodi->keterangan }}</td>
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