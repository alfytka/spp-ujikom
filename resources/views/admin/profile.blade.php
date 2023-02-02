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

          <img src="/img/profile-img.jpg" alt="Profile" class="rounded-circle">
          <h2 class="fw-semibold">Andre DWP Aselole</h2>
          <h6 class="fw-normal">Administrator</h6>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Your Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Nama Admin</div>
                <div class="col-lg-9 col-md-8">Alfitka</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Username</div>
                <div class="col-lg-9 col-md-8">alfitkasix</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">alfitkasix@gmail.com</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Telepon</div>
                <div class="col-lg-9 col-md-8">+62 812348278</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Alamat</div>
                <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
              </div>

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