@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold">Data Kelas</h5>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">

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
                  <div class="col-12 col-md-6 col-lg-6">
                    <h6 class="card-title">Daftar Kelas</h6>
                  </div>
                  <div class="col-3 col-md-2 col-lg-2 my-auto pe-0">
                    <form action="{{ url()->current() }}" method="GET">
                      <select name="filter" id="filter" class="form-select form-select-sm mt-1 mb-3 mb-lg-0 mt-lg-3 mt-md-3 roundedx">
                        @foreach ($dataprodi as $prodi)
                          <option value="{{ $prodi->id }}">{{ $prodi->keterangan }}</option>
                        @endforeach
                      </select>
                    </form>
                  </div>
                  <div class="col-9 col-md-4 col-lg-4 my-auto">
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
                @if ($datakelas->count() > 0)
                <table class="table table-sm mt-lg-2">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Kelas</th>
                      <th scope="col">Kompetensi Keahlian</th>
                      <th scope="col">Opsi</th>
                    </tr>
                  </thead>
                  <tbody class="">
                  @foreach ($datakelas as $kelas)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $kelas->kelas }}</td>
                      <td>{{ $kelas->kompetensiKeahlian->name }}</td>
                      <td>
                        <a href="/datakelas/{{ $kelas->id }}" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="/datakelas/{{ $kelas->id }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kelas?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                @else
                <div class="text-center mt-4 mb-5">
                  <i class="text-danger fs-1 bi bi-backspace"></i>
                  <h5 class="mt-2">Maaf, data tidak (<i class="bi bi-x"></i>) ditemukan.</h5>
                  <div class="mt-5">
                    <a href="{{ route('datakelas.index') }}" class="fw-semibold"><i class="bi bi-arrow-return-left pe-1"></i> Tampilan awal</a>
                  </div>
                </div>
                @endif
                
                <!-- End Default Table Example -->
              </div>
            </div>
          </div>

      <!-- <div class="row">

      </div> -->
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-plus-lg"></i> Tambah Data Kelas</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/datakelas" method="POST">
            @csrf
            <div class="col-12">
              <label for="namaKelas" class="form-label">Nama Kelas</label>
              <input type="text" name="kelas" class="form-control form-control-smx roundedx @error('kelas') is-invalid @enderror" placeholder="ex: XII RPL 1" id="namaKelas" autocomplete="off" value="{{ old('kelas') }}">
              @error('kelas')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="dataProdi" class="form-label">Kompetensi Keahlian</label>
              <select name="kompetensikeahlian_id" id="dataProdi" class="form-select form-select-smx roundedx @error('kompetensikeahlian_id') is-invalid @enderror">
                <option disabled value>- Pilih kompetensi keahlian -</option>
                @foreach ($dataprodi as $prodi)
                  <option disabled selected hidden>- Pilih kompetensi keahlian -</option>
                  <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                @endforeach
              </select>
              @error('kompetensikeahlian_id')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
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