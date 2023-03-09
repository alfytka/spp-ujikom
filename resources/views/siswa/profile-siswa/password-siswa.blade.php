@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Edit Password</title>
@endsection
@section('content')
  
<div class="pagetitle d-none d-md-inline d-lg-inline">
  <h5 class="fw-semibold">Profile</h5>
</div>

<section class="section profile">
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="row mx-0 mx-md-4 mx-lg-4 mb-4 mt-2">
          <div class="col-5">
            <h6><i class="bi bi-chevron-left me-2"></i><a href="/profile-siswa">Kembali</a></h6>
          </div>
          <div class="col-7 d-flex flex-row-reverse">
            <h6 class="text-end"><a href="/profile-siswa/edit"><span class="d-none d-md-inline d-lg-inline">Edit</span> Profile</a><i class="bi bi-chevron-right ms-2"></i></h6>
          </div>
        </div>

        <form action="/profile-siswa/password/{{ auth()->user()->id }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row mx-0 mx-md-4 mx-lg-4 mb-5">
            <div class="col-12 col-md-6 col-lg-6">
              @if (session()->has('informasi'))
              <div class="alert alert-light border-zinc roundeds alert-dismissible me-0 me-md-3 fade show" role="alert">
                <i class="bi bi-exclamation-circle-fill ms-1 py-0 my-0 me-2"></i>
                <span><b>Error - </b>{{ session('informasi') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif 
              <div class="col-12 mb-3 pe-0 pe-md-3 pe-lg-3">
                <input type="hidden" name="password" value="{{ auth()->user()->password }}">
                <label for="current_password">Password sebelumnya</label>
                <input type="password" class="form-control form-control-smx mt-1 roundedx @error('current_password') is-invalid @enderror" autocomplete="off" name="current_password" id="current_password" placeholder="Masukkan password sebelumnya">
                @error('current_password')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-12 mb-3 pe-0 pe-md-3 pe-lg-3">
                <label for="new_password">Password Baru</label>
                <input type="password" class="form-control form-control-smx mt-1 roundedx @error('new_password') is-invalid @enderror" autocomplete="off" name="new_password" id="new_password" placeholder="Password baru">
                @error('new_password')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-12 mb-3 pe-0 pe-md-3 pe-lg-3">
                <label for="konfirmasi_password">Konfirmasi Password</label>
                <input type="password" class="form-control form-control-smx mt-1 roundedx @error('konfirmasi_password') is-invalid @enderror" autocomplete="off" name="konfirmasi_password" id="konfirmasi_password" placeholder="Ulangi password">
                @error('konfirmasi_password')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-12 text-end pe-0 pe-md-3 pe-lg-3">
                <button type="submit" class="btnn btn-ol-violet ps-4 roundedx">Simpan <i class="bi bi-check2 fs-6 pe-1"></i></button>
              </div>
            </div>
            </form>

            <div class="col-12 col-md-6 col-lg-6">
              <div class="col-12 col-md-12 col-lg-12 d-none d-md-inline d-lg-inline detail-form">

                <div class="col-12 mb-2">
                  <div class="row ">
                    <div class="col-9">
                      <small class="title-profile-top">Nama Lengkap</small>
                      <h6 class="mb-0 fw-normal fs-12">{{ auth()->user()->name }}</h6>
                    </div>
                    <div class="col-3 my-auto text-end">
                      <h6><i class="fs-4 bi bi-person text-primary me-2 me-md-3 me-lg-3"></i></h6>
                    </div>
                  </div>
                </div>

                <div class="border-top mb-1 "></div>

                <div class="col-12 mb-2">
                  <div class="row ">
                    <small class="title-profile-top">Username</small>
                    <h6 class="mb-0 fw-normal fs-12">{{ auth()->user()->username }}</h6>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="row ">
                    <small class="title-profile-top">Email</small>
                    <h6 class="mb-0 fw-normal fs-12">{{ auth()->user()->email }}</h6>
                  </div>
                </div>
                
                <div class="border-top mb-1 "></div>

                <div class="col-12 mb-2">
                  <div class="row ">
                    <div class="col-8">
                      <small class="title-profile-top">Telepon</small>
                      <h6 class="mb-0">{{ auth()->user()->telepon }}</h6>
                    </div>
                    <div class="col-4 my-auto text-end">
                      <i class="fs-5 bi bi-telephone me-3 text-primary"></i>
                        <i class="fs-5 bi bi-chat me-2 me-md-3 me-lg-3 text-primary"></i>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-4">
                  <div class="row ">
                    <div class="col-9">
                      <small class="title-profile-top">Alamat</small>
                      <h6 class="mb-2 fw-normal fs-12">{{ auth()->user()->alamat }}</h6>
                    </div>
                    <div class="col-3 my-auto text-end">
                      <i class="fs-5 bi bi-geo-alt me-2 me-md-3 me-lg-3 text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
@endsection