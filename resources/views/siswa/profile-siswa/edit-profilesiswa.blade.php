@extends('layouts.siswa.main')

@section('content')
  
<div class="page-heading">
  <h5>Edit Profile</h4>
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
            <h6 class="text-end"><a href="/profilesiswa/ubahpassword"><span class="d-none d-md-inline d-lg-inline">Ubah</span> Password</a><i class="bi bi-chevron-right ms-2"></i></h6>
          </div>
        </div>

        <form action="" method="">
          <div class="row mx-4 mb-5">
            <div class="col-12 col-md-6 col-lg-6">
              {{-- <div class="mt-1 mb-4 d-flex flex-column align-items-center">
                <img src="/img/profile-img.jpg" alt="Profile"  class="profile-img rounded-circle">
              </div> --}}

              <div class="mt-1 mb-4 d-flex flex-column align-items-center">
                <a href="#"><i class="bi bi-pen pena"></i>
                  <img src="/img/profile-img.jpg" alt="Profile" style="max-width: 120px;" class="profile-img rounded-circle">
                </a>
              </div>

              <div class="col-12 text-end">
                <button type="submit" class="btn btn-sm btn-outline-primary ps-4 rounded-4">Simpan <i class="bi bi-check2 fs-6 pe-1"></i></button>
              </div>

              <div class="col-12 mb-3">
                <label for="nisn">NISN</label>
                <div class="form-group position-relative has-icon-right">
                  <input type="text" class="form-control roundedx" placeholder="Masukkan nisn kamu">
                  <div class="form-control-icon">
                    <i class="bi bi-globe2"></i>
                  </div>
                </div>
              </div>

              <div class="col-12 mb-3">
                <label for="nisn">NIS</label>
                <div class="form-group position-relative has-icon-right">
                  <input type="text" class="form-control roundedx" placeholder="Juga masukkan nis kamu">
                  <div class="form-control-icon">
                    <i class="bi bi-award"></i>
                  </div>
                </div>
              </div>

              <div class="col-12 mb-3">
                <label for="nisn">Nama Siswa</label>
                <div class="form-group position-relative has-icon-right">
                  <input type="text" class="form-control roundedx" placeholder="Nama lengkap kamu">
                  <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-12 col-md-6 col-lg-6">

              <div class="col-12 col-md-12 col-lg-12 detail-form">

                <div class="col-12 mb-3">
                  <label for="nisn">Kelas</label>
                  <div class="form-group position-relative has-icon-right">
                    <select name="kelas" id="kelas" class="form-select roundedx">
                      <option value="">XII RPL 1</option>
                      <option value="">XII RPL 1</option>
                      <option value="">XII RPL 1</option>
                    </select>
                  </div>
                </div>

                {{-- <div class="border-top mb-2 "></div> --}}

                <div class="col-12 mb-3">
                  <label for="nisn">Username</label>
                  <div class="form-group position-relative has-icon-right">
                    <input type="text" class="form-control roundedx" placeholder="Masukkan username">
                    <div class="form-control-icon">
                      <i class="bi bi-person-lock"></i>
                    </div>
                  </div>
                </div>

                <div class="col-12 mb-3">
                  <label for="nisn">Email</label>
                  <div class="form-group position-relative has-icon-right">
                    <input type="text" class="form-control roundedx" placeholder="Begitu juga dengan email">
                    <div class="form-control-icon">
                      <i class="bi bi-at"></i>
                    </div>
                  </div>
                </div>

                <div class="border-top mb-2 "></div>

                <div class="col-12 mb-3">
                  <label for="nisn">Telepon</label>
                  <div class="form-group position-relative has-icon-right">
                    <input type="text" class="form-control roundedx" placeholder="Boleh lah nomor hpnya">
                    <div class="form-control-icon">
                      <i class="bi bi-telephone"></i>
                    </div>
                  </div>
                </div>

                <div class="col-12 mb-3">
                  <label for="nisn">Alamat</label>
                  <div class="form-group position-relative has-icon-right">
                    <input type="text" class="form-control roundedx" placeholder="Kali ini terakhir deh, alamat">
                    <div class="form-control-icon">
                      <i class="bi bi-geo-alt"></i>
                    </div>
                  </div>
                </div>
                
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>
   
  </section>
</div>

@endsection

