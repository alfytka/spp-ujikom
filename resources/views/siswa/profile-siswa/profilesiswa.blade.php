@extends('layouts.siswa.main')

@section('content')
  
<div class="page-heading">
  <h5>Profile Siswa</h5>
</div>
<div class="page-content mb-5">
  <section class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="alert alert-primary alert-dismissible fade show roundedx" role="alert">
        <i class="bi bi-check-circle mx-2 fs-6"></i> Data berhasil diperbarui.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <div class="card">
        <div class="row mx-3 my-4">
          <div class="col-5">
            <h6>Detail Siswa</h6>
          </div>
          <div class="col-7 d-flex flex-row-reverse">
            <h6 class="text-end d-none d-md-flex d-lg-flex"><a href="/profilesiswa/ubahpassword">Ubah Password</a><i class="bi bi-chevron-right ms-0 ms-md-2"></i></h6>
            <h6 class="text-end me-0 me-md-3 me-lg-3"><a href="/profilesiswa/edit">Edit <span class="d-none d-md-inline d-lg-inline">Profile</span></a><i class="bi bi-chevron-right ms-0 ms-md-2"></i></h6>
          </div>
        </div>

        <div class="row mx-4">
          <div class="col-12 col-md-6 col-lg-6 pe-0">
            <div class="mt-1 mb-4 d-flex flex-column align-items-center">
          
              <img src="/img/profile-img.jpg" alt="Profile"  class="profile-img rounded-circle">
              <h5 class="fw-semibold name mt-3">Alfitka</h5>
              <h6 class="fw-normal name">Siswa</h6>
            </div>

            <div class="col-12 mb-3">
              <div class="row ">
                <div class="col-8">
                  <h6 class="mb-0 text-primary">890890890EW</h6>
                  <small class="title-profile">NISN</small>
                </div>
                <div class="col-4 my-auto text-end">
                  <i class="fs-5 bi bi-globe2 text-primary me-2 me-md-3 me-lg-3"></i>
                </div>
              </div>
            </div>

            <div class="col-12 mb-2">
              <div class="row ">
                <h6 class="mb-0 text-primary">10.2021.02020</h6>
                <small class="title-profile">NIS</small>
              </div>
            </div>

          </div>

          <div class="col-12 col-md-6 col-lg-6 pe-0 pe-md-3 pe-lg-3">

            <div class="col-12 col-md-12 col-lg-12 detail-form">

              <div class="col-12 mb-2">
                <div class="row ">
                  <div class="col-9">
                    <small class="title-profile-top">Nama Siswa</small>
                    <h6 class="mb-0 text-primary">Alfitka Haerul</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <h6><i class="fs-4 bi bi-person text-primary me-2 me-md-3 me-lg-3"></i></h6>
                  </div>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="row ">
                  <small class="title-profile-top">Kelas</small>
                  <h6 class="mb-0 fw-normal">XII DKV 1</h6>
                </div>
              </div>

              <div class="border-top mb-2 "></div>

              <div class="col-12 mb-2">
                <div class="row ">
                  <div class="col-6">
                    <small class="title-profile-top">Tahun SPP</small>
                    <h6 class="mb-0 text-primary">2002</h6>
                  </div>
                  <div class="col-6 my-auto text-end">
                    <i class="fs-6 text-primary me-2 me-md-3 me-lg-3">spp</i>
                  </div>
                </div>
              </div>

              <div class="col-12 mb-2">
                <div class="row ">
                  <small class="title-profile-top">Username</small>
                  <h6 class="mb-0 fw-normal">Alfitka</h6>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="row ">
                  <small class="title-profile-top">Email</small>
                  <h6 class="mb-0 fw-normal">alfitka@gmail.com</h6>
                </div>
              </div>

              <div class="border-top mb-2 "></div>

              <div class="col-12">
                <div class="row ">
                  <div class="col-8">
                    <small class="title-profile-top">Telepon</small>
                    <h6 class="mb-2 text-primary">9878787722</h6>
                  </div>
                  <div class="col-4 my-auto text-end">
                    <i class="fs-5 bi bi-telephone me-3 text-primary"></i>
                    <i class="fs-5 bi bi-chat me-2 me-md-3 me-lg-3 text-primary"></i>
                  </div>
                </div>
              </div>
              
              <div class="col-12 mb-5">
                <div class="row ">
                  <div class="col-9">
                    <small class="title-profile-top">Alamat</small>
                    <h6 class="mb-2 fw-normal">kkadsjfkjk</h6>
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
   
  </section>
</div>

@endsection
