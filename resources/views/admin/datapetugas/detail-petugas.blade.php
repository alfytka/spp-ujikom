@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold"><a href="{{ route('datapetugas.index') }}" class="back-icon"><i class="bi bi-chevron-left back-icon"></i></a> <span class="ps-1">Data Petugas</span></h5>
</div><!-- End Page Title -->

<section class="section dashboard mb-5">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-md-9 col-lg-6">
      <div class="cardxy border-none shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h5 class="card-title ms-1">Detail Petugas</h5>
            </div>
            <div class="col-6 text-end">
              <h5 class="card-title"><a href="/datapetugas/{{ $datapetugas->id }}/edit">Edit <i class="bi bi-chevron-right"></i></a></h5>
            </div>
          </div>

          <!-- Vertical Form -->
          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="#">
            <div class="col-12 col-md-12 col-lg-12 detail-form">


            {{-- <div class="card"> --}}
              <div class="card-body profile-card pt-3 d-flex flex-column align-items-center">
      
                <img src="/img/profile-img.jpg" alt="Profile"  class="profile-img rounded-circle">
                <h5 class="fw-semibold name mt-3">{{ $datapetugas->name }}</h5>
                <h6 class="fw-normal name pt-0">Petugas</h6>
              </div>
            {{-- </div> --}}


              <div class="col-12 mb-3">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Nama Petugas</small>
                    <h6 class="mb-0">{{ $datapetugas->name }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-4 bi bi-person text-blue me-3"></i>
                  </div>
                </div>
              </div>

              <div class="border-top mb-2"></div>

              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Username</small>
                    <h6 class="mb-0 fw-normal">{{ $datapetugas->username }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-5 bi bi-unlock text-blue me-3"></i>
                  </div>
                </div>
              </div>

              <div class="col-12 mb-3">
                <small class="title-profile-top">Email</small>
                <h6 class="mb-0 fw-normal">{{ $datapetugas->email }}</h6>
              </div>

              <div class="border-top mb-2"></div>

              <div class="col-12">
                <div class="row">
                  <div class="col-8">
                    <small class="title-profile-top">Telepon</small>
                    <h6 class="mb-2">{{ $datapetugas->telepon }}</h6>
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
                    <h6 class="mb-2 fw-normal">{{ $datapetugas->alamat }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-5 bi bi-geo-alt text-blue me-3"></i>
                  </div>
                </div>
              </div>

            </div>

          </form><!-- Vertical Form -->

        </div>
      </div>
    </div><!-- End Left side columns -->


  </div>
</section>

@endsection

