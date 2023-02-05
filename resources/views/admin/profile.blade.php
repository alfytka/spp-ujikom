@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold">Profile</h5>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="/img/profile-img.jpg" alt="Profile" class="profile-img rounded-circle">
          <h5 class="fw-semibold mt-4">Admin</h5>
          <h6 class="fw-normal"></h6>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3 px-0 px-md-3 px-lg-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs col-12 col-md-10 col-lg-10 nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile Detail</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">


              <!-- Vertical Form -->
              <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="#">
                <div class="col-12 col-md-12 col-lg-12 detail-form">


                  {{-- <div class="border-top  mb-3"></div> --}}
                  <div class="col-12 col-md-10 col-lg-10 mt-4 mb-">
                    <div class="row">
                      <div class="col-8">
                        <h6 class="mb-1 fw-normal">3013282831</h6>
                        <small class="title-profile">NISN</small>
                      </div>
                      <div class="col-4 my-auto text-end">
                        <i class="fs-5 bi bi-globe2 text-blue me-3"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-md-10 col-lg-10 mb-2">
                    <h6 class="mb-1 fw-normal">10.2021.222</h6>
                    <small class="title-profile">NIS</small>
                  </div>

                  <div class="col-12 col-md-10 col-lg-10 border-top mb-2"></div>

                  <div class="col-12 col-md-10 col-lg-10 mb-2">
                    <div class="row">
                      <div class="col-9">
                        <small class="title-profile-top">Nama Siswa</small>
                        <h6 class="mb-0">Kamaludin</h6>
                      </div>
                      <div class="col-3 my-auto text-end">
                        <i class="fs-4 bi bi-person text-blue me-3"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-md-10 col-lg-10 mb-3">
                    <small class="title-profile-top">Kelas</small>
                    <h6 class="mb-0 fw-normal">XII AKL 3</h6>
                  </div>

                  <div class="col-12 col-md-10 col-lg-10 border-top mb-2"></div>

                  <div class="col-12 col-md-10 col-lg-10 mb-2">
                    <div class="row">
                      <div class="col-6">
                        <small class="title-profile-top">Tahun SPP</small>
                        <h6 class="mb-0">2022</h6>
                      </div>
                      <div class="col-6 my-auto text-end">
                        <i class="fs-6 text-blue me-3">spp</i>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-md-10 col-lg-10 mb-2">
                    <small class="title-profile-top">Username</small>
                    <h6 class="mb-0 fw-normal">Kamaladan</h6>
                  </div>

                  <div class="col-12 col-md-10 col-lg-10 mb-3">
                    <small class="title-profile-top">Email</small>
                    <h6 class="mb-0 fw-normal">kamal@yahoo.com</h6>
                  </div>

                  <div class="col-12 col-md-10 col-lg-10 border-top mb-2"></div>

                  <div class="col-12 col-md-10 col-lg-10">
                    <div class="row">
                      <div class="col-8">
                        <small class="title-profile-top">Telepon</small>
                        <h6 class="mb-0">08532173827</h6>
                      </div>
                      <div class="col-4 my-auto text-end">
                        <i class="fs-5 bi bi-telephone text-blue me-3"></i>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-12 col-md-10 col-lg-10 mb-2">
                    <div class="row">
                      <div class="col-9">
                        <small class="title-profile-top">Alamat</small>
                        <h6 class="mb-2 fw-normal">Bogor, Jawa Barat</h6>
                      </div>
                      <div class="col-3 my-auto text-end">
                        <i class="fs-5 bi bi-geo-alt text-blue me-3"></i>
                      </div>
                    </div>
                  </div>

                </div>

              </form><!-- Vertical Form -->

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form>
                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Admin</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="fullName" type="text" class="form-control roundedx" id="fullName" value="Alfitka">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Username</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="company" type="text" class="form-control roundedx" id="company" value="alfitkasix">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Job" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="job" type="text" class="form-control roundedx" id="Job" value="alfitkasix@gmail.com">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Country" class="col-md-4 col-lg-3 col-form-label">Telepon</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="country" type="text" class="form-control roundedx" id="Country" value="+68 123264781">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="about" class="form-control roundedx" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. </textarea>
                  </div>
                </div>

                <div class="text-end">
                  <button type="submit" class="btnn btn-navy py-2 px-md-5 px-4">Simpan <i class="bi bi-chevron-right ps-1"></i></button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

@endsection