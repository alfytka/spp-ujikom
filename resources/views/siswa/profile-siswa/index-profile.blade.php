@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Profile Siswa</title>
@endsection
@section('content')
  
<div class="pagetitle d-none d-md-inline d-lg-inline">
  <h5 class="fw-semibold">Profile</h5>
</div>

<section class="section profile">
  <div class="row">
    
    <div class="col-12 col-md-12 col-lg-12">
      @if (session()->has('informasi'))
      <div class="col-12 col-md-6 col-lg-6">
        <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
          <span><b>Berhasil - </b>{{ session('informasi') }}</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
      @endif
      <div class="card">
        <div class="row mx-0 mx-md-4 mx-lg-4 mb-4 mt-2">
          <div class="col-5">
            <h6>Detail Profile</h6>
          </div>
          <div class="col-7 d-flex flex-row-reverse">
            <h6 class="text-end d-none d-md-flex d-lg-flex"><a class="fc-black" href="/profile-siswa/password">Edit Password</a><i class="bi bi-chevron-right ms-0 ms-md-2"></i></h6>
            <h6 class="text-end me-0 me-md-3 me-lg-3"><a class="fc-black" href="/profile-siswa/edit">Edit <span class="d-none d-md-inline d-lg-inline">Profile</span></a><i class="bi bi-chevron-right ms-0 ms-md-2"></i></h6>
          </div>
        </div>

        <div class="row mx-0 mx-md-4 mx-lg-4">
          <div class="col-12 col-md-6 col-lg-6 pe-0">
            <div class="mt-1 mb-4 d-flex flex-column align-items-center">
              @if (auth()->user()->foto > 1)
                <img src="/img/photo-siswa/{{ auth()->user()->foto }}" alt="Profile" class="profile-img rounded-circle border">
              @else
                <img src="/img/profile-img.jpg" alt="Profile" class="profile-img rounded-circle border">
              @endif
              <h5 class="fw-semibold name mt-3 mb-1">{{ auth()->user()->username }}</h5>
              <h6 class="fw-normal name">Siswa</h6>
            </div>

            <div class="col-12 mb-2">
              <div class="row ">
                <div class="col-8">
                  <h6 class="mb-0">{{ auth()->user()->nisn }}</h6>
                  <small class="title-profile">NISN</small>
                </div>
                <div class="col-4 my-auto text-end">
                  <i class="fs-5 bi bi-globe2 text-primary me-2 me-md-3 me-lg-3"></i>
                </div>
              </div>
            </div>

            <div class="col-12 mb-1">
              <div class="row ">
                <h6 class="mb-1">{{ auth()->user()->nis }}</h6>
                <small class="title-profile">NIS</small>
              </div>
            </div>

            <div class="border-top mb-1 d-block d-md-none d-lg-none"></div>

          </div>

          <div class="col-12 col-md-6 col-lg-6 pe-0 pe-md-3 pe-lg-3 mt-0 mt-md-3 mt-lg-3">

            <div class="col-12 col-md-12 col-lg-12 detail-form">

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

              <div class="col-12 mb-2">
                <div class="row ">
                  <small class="title-profile-top">Kelas</small>
                  <h6 class="mb-0 fw-normal fs-12">{{ auth()->user()->kelas->kelas }}</h6>
                </div>
              </div>

              <div class="border-top mb-1 "></div>

              <div class="col-12 mb-2">
                <div class="row ">
                  <div class="col-9">
                    <small class="title-profile-top">Tahun SPP</small>
                    <h6 class="mb-0 fw-normal fs-12">{{ auth()->user()->spp->tahun }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <h6 class="fw-normal"><i class="fs-6 text-primary me-2 me-md-3 me-lg-3">spp</i></h6>
                  </div>
                </div>
              </div>

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