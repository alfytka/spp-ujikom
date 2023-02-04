@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold">Data Kompetensi Keahlian</h5>
</div><!-- End Page Title -->

<!-- Confirmation Modal -->
<div class="modal modal-sm fade py-5" id="konfirmasi" tabindex="-1" data-bs-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-bottom-0">
        <h1 class="modal-title fs-5">Konfirmasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-0 mb-1">
        Hapus data kompetensi keahlian?
      </div>
      <div class="modal-footer flex-column border-top-0">
        <button type="button" class="button-9 w-100 mx-0 mb-2 roundedx">Ya, hapus</button>
        <button type="button" class="btn-y w-100 mx-0" data-bs-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div><!-- End Disabled Backdrop Modal-->

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
                  <div class="col-12 col-md-8 col-lg-8">
                    <h6 class="card-title">Data Kompetensi Keahlian</h6>
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
                @if ($dataprodi->count() > 0)
                <table class="table table-sm mt-lg-2">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Jurusan</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Opsi</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    @foreach ($dataprodi as $prodi)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $prodi->name }}</td>
                      <td>{{ $prodi->keterangan }}</td>
                      <td>
                        <a href="/dataprodi/{{ $prodi->id }}/edit" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="/dataprodi/{{ $prodi->id }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
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
                    <a href="{{ route('dataprodi.index') }}" class="fw-semibold"><i class="bi bi-arrow-return-left pe-1"></i> Tampilan awal</a>
                  </div>
              </div>
                @endif
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
          <h5 class="card-title"><i class="bi bi-plus-lg"></i> Tambah Jurusan</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/dataprodi" method="POST">
            @csrf
            <div class="col-12">
              <label for="name" class="form-label">Nama Jurusan</label>
              <input type="text" name="name" class="form-control form-control-smx roundedx @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama jurusan" id="name" autocomplete="off">
              @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="keterangan" class="form-label mb-">Keterangan</label>
              <input type="text" name="keterangan" class="form-control form-control-smx roundedx @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" placeholder="Singkatan: RPL" id="keterangan" autocomplete="off">
              @error('keterangan')
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

