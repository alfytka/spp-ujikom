@extends('layouts.kerangka')
@section('titles')
<title>SPP - Detail Admin</title>
@endsection
@section('content')

<div class="pagetitle">
  <h5 class="fw-semibold"><a href="{{ route('dataadmin.index') }}" class="back-icon"><i class="bi bi-chevron-left back-icon"></i></a> <span class="ps-1">Data Admin</span></h5>
</div>

<section class="section dashboard mb-5">
  <div class="row">
    <div class="col-md-9 col-lg-6">
      @if (session()->has('informasi'))
      <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
        <span><b>Berhasil - </b>{{ session('informasi') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif 
      <div class="cardxy border-none shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h5 class="card-title ms-1">Detail Admin</h5>
            </div>
            <div class="col-6 text-end">
              <div class="dropdown">
                <a data-bs-toggle="dropdown" class="card-title text-primary" type="button"> Edit <i class="bi bi-chevron-down ps-1"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="/dataadmin/{{ $dataadmin->id }}/edit" class="dropdown-item">Edit Data <i class="bi bi-pen float-end"></i></a></li>
                  <div class="border-bottom mx-2"></div>
                  <li><a href="/dataadmin/{{ $dataadmin->id }}/upload-photo" class="dropdown-item text-bluebook">Upload Foto <i class="bi bi-image float-end"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="#">
            <div class="col-12 col-md-12 col-lg-12 detail-form">
              <div class="card-body profile-card pt-3 d-flex flex-column align-items-center">
                @if ($dataadmin->foto > 1)
                  <img src="/img/photo-petugas/{{ $dataadmin->foto }}" alt="Profile" class="profile-img rounded-circle border">
                @else
                  <img src="/img/profile-img.jpg" alt="Profile" class="profile-img rounded-circle border">
                @endif
                <h6 class="fw-semibold name mt-3 mb-1 text-center">{{ $dataadmin->name }}</h6>
                <h6 class="fw-normal pt-0 fs-10">Admin</h6>
              </div>
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Nama Admin</small>
                    <h6 class="mb-0 fw-normal fs-12">{{ $dataadmin->name }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-4 bi bi-person text-blue me-3"></i>
                  </div>
                </div>
              </div>

              <div class="border-top mb-1"></div>

              <div class="col-12 mb-1">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Username</small>
                    <h6 class="mb-0 fw-normal fs-12">{{ $dataadmin->username }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-5 bi bi-unlock text-blue me-3"></i>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <small class="title-profile-top">Email</small>
                <h6 class="mb-0 fw-normal fs-12">{{ $dataadmin->email }}</h6>
              </div>

              <div class="border-top mb-1"></div>

              <div class="col-12">
                <div class="row">
                  <div class="col-8">
                    <small class="title-profile-top">Telepon</small>
                    <h6 class="mb-1 fs-12">{{ $dataadmin->telepon }}</h6>
                  </div>
                  <div class="col-4 my-auto text-end">
                    <i class="fs-5 bi bi-telephone text-blue me-3"></i>
                    <i class="fs-5 bi bi-chat text-blue me-3"></i>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Alamat</small>
                    <h6 class="mb-2 fw-normal fs-12">{{ $dataadmin->alamat }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-5 bi bi-geo-alt text-blue me-3"></i>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection