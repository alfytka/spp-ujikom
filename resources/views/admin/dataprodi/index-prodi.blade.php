@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Data Prodi</title>
@endsection
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
                      <th scope="col">Nama Jurusan</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    @foreach ($dataprodi as $prodi)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $prodi->name }}</td>
                      <td>{{ $prodi->keterangan }}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btnxs btn-view" data-bs-toggle="dropdown"><i class="bi bi-view-list"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="/dataprodi/{{ $prodi->id }}/edit" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                            <li>
                              <form action="/dataprodi/{{ $prodi->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="dropdown-item">Hapus <i class="bi bi-x-lg float-end"></i></button>
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
          <h5 class="card-title"><i class="bi bi-plus-lg"></i> Tambah Jurusan</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/dataprodi" method="POST">
            @csrf
            <div class="col-12">
              <label for="name" class="form-label mb-1">Nama Jurusan</label>
              <input type="text" name="name" class="form-control form-control-smx roundedx @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama jurusan" id="name" autocomplete="off">
              @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="keterangan" class="form-label mb-1">Keterangan</label>
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

@section('my-js')
  <script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/vendor/extensions/simple-datatables.js"></script>    
@endsection