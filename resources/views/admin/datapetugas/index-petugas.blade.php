@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold">Data Petugas</h5>
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
                    <h6 class="card-title">Data Petugas</h6>
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
                @if ($datapetugas->count() > 0)
                <table class="table table-sm mt-lg-2">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Petugas</th>
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
                      <th scope="col">Opsi</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    @foreach ($datapetugas as $petugas)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $petugas->name }}</td>
                      <td>{{ $petugas->username }}</td>
                      <td>{{ $petugas->email }}</td>
                      <td>
                        <a href="/datapetugas/{{ $petugas->id }}" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="/datapetugas/{{ $petugas->id }}/edit" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="/datapetugas/{{ $petugas->id }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
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
                    <a href="{{ route('datapetugas.index') }}" class="fw-semibold"><i class="bi bi-arrow-return-left pe-1"></i> Tampilan awal</a>
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
    <div class="col-lg-4 mb-5">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-plus-lg"></i> Tambah Data Petugas</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/datapetugas" method="POST">
            @csrf
            <div class="col-12">
              <label for="name" class="form-label mb-1">Nama Petugas</label>
              <input type="text" name="name" class="form-control form-control-smx roundedx @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama petugas" id="name" autocomplete="off">
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
                <option value="petugas">Petugas</option>
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



