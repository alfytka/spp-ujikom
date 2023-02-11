@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle d-none d-md-inline d-lg-inline">
  <h5 class="fw-semibold">Profile</h5>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    
    <div class="col-12 col-md-12 col-lg-12">
      {{-- <div class="alert alert-primary alert-dismissible fade show roundedx" role="alert">
        <i class="bi bi-check-circle mx-2 fs-6"></i> Data berhasil diperbarui.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> --}}
      <div class="card">
        <div class="row mx-0 mx-md-4 mx-lg-4 mb-4 mt-2">
          <div class="col-5">
            <h6><i class="bi bi-chevron-left me-2"></i><a href="/profile">Kembali</a></h6>
          </div>
          <div class="col-7 d-flex flex-row-reverse">
            <h6 class="text-end"><a href="/profile/ubahpassword"><span class="d-none d-md-inline d-lg-inline">Ubah</span> Password</a><i class="bi bi-chevron-right ms-2"></i></h6>
          </div>
        </div>

        <form action="/profile/{{ auth()->user()->id }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row mx-0 mx-md-4 mx-lg-4 mb-5">
            <div class="col-12 col-md-6 col-lg-6">
              {{-- <div class="mt-1 mb-4 d-flex flex-column align-items-center">
                <img src="/img/profile-img.jpg" alt="Profile"  class="profile-img rounded-circle">
              </div> --}}

              <div class="mt-1 mb-4 d-flex flex-column align-items-center">
                <img src="/img/profile-img.jpg" alt="Profile" style="max-width: 120px;" class="profile-img rounded-circle">
              </div>

              <div class="col-12 text-end">
                <button type="submit" class="btn btn-sm btn-outline-primary ps-4 rounded-4">Simpan <i class="bi bi-check2 fs-6 pe-1"></i></button>
              </div>

              <div class="col-12 mb-3">
                <label for="foto">Photo Profile</label>
                <input type="file" id="foto" class="form-control roundedx">
              </div>

              <div class="border-top mb-2"></div>

              <div class="col-12 mb-3">
                <label for="name">Nama Lengkap</label>
                <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                <input type="text" class="form-control roundedx @error('name') is-invalid @enderror" autocomplete="off" name="name" value="{{ auth()->user()->name }}" id="name" placeholder="Masukkan nama lengkap">
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

            </div>

            <div class="col-12 col-md-6 col-lg-6">

              <div class="col-12 col-md-12 col-lg-12 detail-form">

                {{-- <div class="border-top mb-2 "></div> --}}

                <div class="col-12 mb-3">
                  <label for="username">Username</label>
                  <input type="text" class="form-control roundedx @error('username') is-invalid @enderror" autocomplete="off" name="username" value="{{ auth()->user()->username }}" id="username" placeholder="Masukkan username">
                  @error('username')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-12 mb-3">
                  <label for="email">Email</label>
                  <input type="text" class="form-control roundedx @error('email') is-invalid @enderror" autocomplete="off" name="email" value="{{ auth()->user()->email }}" id="email" placeholder="Masukkan email">
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="border-top mb-2 "></div>

                <div class="col-12 mb-3">
                  <label for="telepon">Telepon</label>
                  <input type="text" class="form-control roundedx @error('telepon') is-invalid @enderror" autocomplete="off" name="telepon" value="{{ auth()->user()->telepon }}" id="telepon" placeholder="Boleh lah nomor hpnya">
                  @error('telepon')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-12 mb-3">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control roundedx @error('alamat') is-invalid @enderror" autocomplete="off" name="alamat" value="{{ auth()->user()->alamat }}" id="alamat" placeholder="Masukkan alamat">
                  @error('alamat')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</section>

@endsection
