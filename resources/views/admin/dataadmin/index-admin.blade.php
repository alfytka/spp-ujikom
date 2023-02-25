@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Data Admin</title>
@endsection
@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold">Data Admin</h5>
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
                      <th scope="col">Nama <span class="d-none d-md-inline d-lg-inline">Admin</span></th>
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    @foreach ($dataadmin as $admin)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $admin->name }}</td>
                      <td>{{ $admin->username }}</td>
                      <td>{{ $admin->email }}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btnxs btn-view" data-bs-toggle="dropdown"><i class="bi bi-view-list"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="/dataadmin/{{ $admin->id }}/edit" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                            <li><a href="/dataadmin/{{ $admin->id }}" class="dropdown-item">Detail <i class="bi bi-eye float-end"></i></a></li>
                            <li>
                              <form action="/dataadmin/{{ $admin->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus data admin?')" class="dropdown-item">Hapus <i class="bi bi-x-lg float-end"></i></button>
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
    <div class="col-lg-4 mb-5">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-plus-lg"></i> Tambah Data Admin</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/dataadmin" method="POST">
            @csrf
            <div class="col-12">
              <label for="name" class="form-label mb-1">Nama Admin</label>
              <input type="text" name="name" class="form-control form-control-smx roundedx @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama admin" id="name" autocomplete="off">
              @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="email" class="form-label mb-1 mb-">Email</label>
              <input type="text" name="email" class="form-control form-control-smx roundedx @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="example@contoh.com" id="email" autocomplete="off">
              @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="username" class="form-label mb-1 mb-">Username</label>
              <input type="text" name="username" class="form-control form-control-smx roundedx @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Masukkan username" id="username" autocomplete="off">
              @error('username')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="password" class="form-label mb-1 mb-">Password</label>
              <input type="password" name="password" class="form-control form-control-smx roundedx @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Masukkan password" id="password" autocomplete="off">
              @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="telepon" class="form-label mb-1 mb-">Telepon</label>
              <input type="text" name="telepon" class="form-control form-control-smx roundedx @error('telepon') is-invalid @enderror" value="{{ old('telepon') }}" placeholder="XXXX XXXX XXXX" id="telepon" autocomplete="off">
              @error('telepon')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="alamat" class="form-label mb-1 mb-">Alamat</label>
              <input type="text" name="alamat" class="form-control form-control-smx roundedx @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Masukkan alamat" id="alamat" autocomplete="off">
              @error('alamat')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="level" class="form-label mb-1 mb-1 mb-">Level</label>
              <select name="level" class="form-select form-select-smx roundedx @error('level') is-invalid @enderror" id="level">
                <option disabled value>- Level user -</option>
                <option value="admin">Admin</option>
              </select>
            </div>
            <div class="text-end">
              <button type="submit" class="btnn btn-violet py-2 px-4 mt-1 mb-4">Simpan</button>
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