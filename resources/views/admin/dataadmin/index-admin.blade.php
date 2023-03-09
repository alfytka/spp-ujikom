@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Data Admin</title>
@endsection
@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold">Data Admin <span class="float-end d-inline d-md-none"><a href="#q"><i class="bi bi-plus-circle-dotted"></i> <span class="fs-12 fw-normal">Admin</span></a></span></h5>
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
                  <th scope="col">Nama <span class="d-none d-md-inline d-lg-inline">Admin</span></th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($dataadmin as $admin)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td style="min-width: 180px;">{{ $admin->name }}</td>
                <td>{{ $admin->username }}</td>
                <td>{{ $admin->email }}</td>
                <td class="align-middle">
                  <div class="dropdown">
                    <button type="button" class="btnxs btn-white" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                    <ul class="dropdown-menu">
                      <li><a href="/dataadmin/{{ $admin->id }}/edit" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                      <li><a href="/dataadmin/{{ $admin->id }}" class="dropdown-item">Detail <i class="bi bi-text-wrap float-end"></i></a></li>
                      <div class="border-bottom mx-2"></div>
                      <li>
                        <a href="" data-bs-toggle="modal" data-bs-target="#dataadmin{{ $admin->id }}" class="dropdown-item text-danger">Hapus <i class="bi bi-trash3 float-end"></i></a>
                      </li>
                    </ul>
                  </div>
                </td>

                <div class="modal modal-sm fade py-5" id="dataadmin{{ $admin->id }}" tabindex="-1" data-bs-backdrop="false">
                  <div class="modal-dialog">
                    <div class="modal-content rounded-4 shadow">
                      <div class="modal-header border-bottom-0">
                        <h1 class="modal-title fs-6">Konfirmasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body py-0 mb-1 fs-12">
                        Hapus data admin?<br>
                        <span class="text-violet fw-semibold fst-italic"> <i class="bi bi-arrow-return-right"></i> {{ $admin->name }}</span>
                      </div>
                      <div class="modal-footer flex-column border-top-0">
                        <form action="/dataadmin/{{ $admin->id }}" method="POST">
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
          <h5 class="card-title"><i class="bi bi-plus-lg"></i> Tambah Data Admin</h5>
          <form class="row g-3" action="/dataadmin" method="POST">
            @csrf
            <div class="col-12 px-3 px-md-2">
              <label for="name" class="form-label mb-1">Nama Admin</label>
              <input type="text" name="name" class="form-control form-control-smx roundedx @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama admin" id="name" autocomplete="off">
              @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12 px-3 px-md-2">
              <label for="email" class="form-label mb-1 mb-">Email</label>
              <input type="text" name="email" class="form-control form-control-smx roundedx @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="example@contoh.com" id="email" autocomplete="off">
              @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12 px-3 px-md-2">
              <label for="username" class="form-label mb-1 mb-">Username</label>
              <input type="text" name="username" class="form-control form-control-smx roundedx @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Masukkan username" id="username" autocomplete="off">
              @error('username')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12 px-3 px-md-2">
              <label for="password" class="form-label mb-1 mb-">Password</label>
              <input type="password" name="password" class="form-control form-control-smx roundedx @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Masukkan password" id="password" autocomplete="off">
              @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12 px-3 px-md-2">
              <label for="telepon" class="form-label mb-1 mb-">Telepon</label>
              <input type="text" name="telepon" class="form-control form-control-smx roundedx @error('telepon') is-invalid @enderror" value="{{ old('telepon') }}" placeholder="XXXX XXXX XXXX" id="telepon" autocomplete="off">
              @error('telepon')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12 px-3 px-md-2">
              <label for="alamat" class="form-label mb-1 mb-">Alamat</label>
              <input type="text" name="alamat" class="form-control form-control-smx roundedx @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Masukkan alamat" id="alamat" autocomplete="off">
              @error('alamat')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            
            <input type="hidden" name="level" value="admin">

            <div class="text-end px-3 px-md-2">
              <button type="submit" class="btnn btn-violet py-2 ps-4 mb-4">Simpan <i class="bi bi-chevron-right px-1"></i></button>
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