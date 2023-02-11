@extends('layouts.siswa.main')

@section('content')
  
<div class="page-heading">
  <h5>Ubah Password</h4>
</div>
<div class="page-content mb-5">
  <section class="row">
    
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="row mx-3 my-4">
          <div class="col-5">
            <h6><i class="bi bi-chevron-left me-2"></i><a href="/profilesiswa">Kembali</a></h6>
          </div>
          <div class="col-7 d-flex flex-row-reverse">
            <h6 class="text-end"><a href="/profilesiswa/edit">Edit <span class="d-none d-md-inline d-lg-inline">Profile</span></a><i class="bi bi-chevron-right ms-2"></i></h6>
          </div>
        </div>

        <div class="row mx-4">
          <div class="col-12 col-md-6 col-lg-6 mb-4 mb-md-0 mb-lg-0">

            <form action="" method="">
              <div class="col-12 mb-3">
                <label for="nisn">Password Sebelumnya</label>
                <div class="form-group position-relative has-icon-right">
                  <input type="text" class="form-control roundedx" placeholder="Masukkan password saat ini">
                  <div class="form-control-icon">
                    <i class="bi bi-key"></i>
                  </div>
                </div>
              </div>
  
              <div class="col-12 mb-3">
                <label for="nisn">Password Baru</label>
                <div class="form-group position-relative has-icon-right">
                  <input type="text" class="form-control roundedx" placeholder="Password baru?">
                  <div class="form-control-icon">
                    <i class="bi bi-unlock"></i>
                  </div>
                </div>
              </div>
  
              <div class="col-12">
                <label for="nisn">Konfirmasi Password</label>
                <div class="form-group position-relative has-icon-right">
                  <input type="text" class="form-control roundedx" placeholder="Ulangi seperti password baru kamu">
                  <div class="form-control-icon">
                    <i class="bi bi-lock"></i>
                  </div>
                </div>
              </div>

              <div class="col-12 text-end mb-4">
                <button type="submit" class="btn btn-sm btn-outline-primary ps-4 rounded-4">Simpan <i class="bi bi-check2 fs-6 pe-1"></i></button>
              </div>
            </form>

          </div>

          <div class="col-12 col-md-6 col-lg-6 pe-0 pe-md-3 pe-lg-3 d-none d-md-inline d-lg-inline">

            <div class="col-12 col-md-12 col-lg-12 detail-form">

              <div class="col-12 mb-2">
                <div class="row ">
                  <div class="col-9">
                    <small class="title-profile-top">Nama Siswa</small>
                    <h6 class="mb-0 text-primary">Alfitka Haerul</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <h6><i class="fs-4 bi bi-person text-primary me-3"></i></h6>
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
                    <i class="fs-6 me-3 text-primary">spp</i>
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
                    <i class="fs-5 bi bi-chat me-3 text-primary"></i>
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
                    <i class="fs-5 bi bi-geo-alt me-3 text-primary"></i>
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


