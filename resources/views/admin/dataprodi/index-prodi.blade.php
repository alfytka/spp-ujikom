@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Data Prodi</title>
@endsection
@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold">Data <span class="d-none d-md-inline">Kompetensi Keahlian</span> <span class="d-inline d-md-none">Prodi</span> <span class="float-end d-inline d-md-none"><a href="#q"><i class="bi bi-plus-circle-dotted"></i> <span class="fs-12 fw-normal">Prodi</span></a></span></h5>
</div>

<section class="section dashboard">
  <div class="row">

    <div class="col-lg-8">
      @if (session()->has('informasi'))
        <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
          <span><b>Berhasil - </b>{{ session('informasi') }}</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif 

      <div class="cardxy shadow-sm mb-4">
        <div class="card-body">
          <div class="table-responsive mt-4 mt-md-3 mt-lg-3">
            <table class="table table-sm" id="table1">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($dataprodi as $prodi)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $prodi->name }}</td>
                <td>{{ $prodi->keterangan }}</td>
                <td class="align-middle">
                  <div class="dropdown">
                    <button type="button" class="btnxs btn-white" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                    <ul class="dropdown-menu">
                      <li><a href="/dataprodi/{{ $prodi->id }}/edit" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                      <div class="border-bottom mx-2"></div>
                      <li>
                        <a href="" data-bs-toggle="modal" data-bs-target="#dataprodi{{ $prodi->id }}" class="dropdown-item text-danger">Hapus <i class="bi bi-trash3 float-end"></i></a>
                      </li>
                    </ul>
                  </div>
                </td>

                <div class="modal modal-sm fade py-5" id="dataprodi{{ $prodi->id }}" tabindex="-1" data-bs-backdrop="false">
                  <div class="modal-dialog">
                    <div class="modal-content rounded-4 shadow">
                      <div class="modal-header border-bottom-0">
                        <h1 class="modal-title fs-6">Konfirmasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body py-0 mb-1 fs-12">
                        Hapus data kompetensi keahlian?<br>
                        <span class="text-violet fw-semibold fst-italic"> <i class="bi bi-arrow-return-right"></i> {{ $prodi->name }} - {{ $prodi->keterangan }}</span>
                      </div>
                      <div class="modal-footer flex-column border-top-0">
                        <form action="/dataprodi/{{ $prodi->id }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="button-9 w-100 mx-0 mb-2 roundedx">Ya, hapus</button>
                        </form>
                        <button type="button" class="btn-y w-100 mx-0" data-bs-dismiss="modal">Batal</button>
                      </div>
                    </div>
                  </div>
                </div>

              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 mb-5">
      <div class="cardxy shadow-sm" id="q">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-plus-lg"></i> Tambah Jurusan</h5>
          <form class="row g-3" action="/dataprodi" method="POST">
            @csrf
            <div class="col-12 px-3 px-md-2">
              <label for="name" class="form-label mb-1">Nama Jurusan</label>
              <input type="text" name="name" class="form-control form-control-smx roundedx @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama jurusan" id="name" autocomplete="off">
              @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12 px-3 px-md-2">
              <label for="keterangan" class="form-label mb-1">Keterangan</label>
              <input type="text" name="keterangan" class="form-control form-control-smx roundedx @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" placeholder="Singkatan: RPL" id="keterangan" autocomplete="off">
              @error('keterangan')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="text-end px-3 px-md-2">
              <button type="submit" class="btnn btn-violet py-2 ps-4 mb-3">Simpan <i class="bi bi-chevron-right px-1"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection

@section('my-js')
  <script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/vendor/extensions/simple-datatables.js"></script>    
@endsection