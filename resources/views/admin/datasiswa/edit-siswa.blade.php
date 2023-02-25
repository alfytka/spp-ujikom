@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Edit Data Siswa</title>
@endsection
@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold"><a type="button" onclick="history.back()" class="back-icon"><i class="bi bi-chevron-left back-icon"></i></a> <span class="ps-1">Data Siswa</span></h5>
</div><!-- End Page Title -->

<section class="section dashboard mb-5">
  <div class="row">

    <!-- Right side columns -->
    <div class="col-lg-9">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-cursor-text"></i> Ubah Data Siswa</h5>

          <!-- Vertical Form -->
          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="/datasiswa/{{ $datasiswa->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12 col-md-6 col-lg-6 pe-2 pe-md-3 pe-lg-3">

              <div class="form-group mb-3">
                <label for="nisn" class="form-label mb-1">NISN</label>
                <input type="text" name="nisn" class="form-control form-control-smx roundedx @error('nisn') is-invalid @enderror" value="{{ $datasiswa->nisn, old('nisn') }}" placeholder="Masukkan nisn" id="nisn" autocomplete="off">
                @error('nisn')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="nis" class="form-label mb-1">NIS</label>
                <input type="text" name="nis" class="form-control form-control-smx roundedx @error('nis') is-invalid @enderror" value="{{ $datasiswa->nis, old('nis') }}" placeholder="Masukkan nis" id="nis" autocomplete="off">
                @error('nis')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="name" class="form-label mb-1">Nama Siswa</label>
                <input type="text" name="name" class="form-control form-control-smx roundedx @error('name') is-invalid @enderror" value="{{ $datasiswa->name, old('name') }}" placeholder="Masukkan nama siswa" id="name" autocomplete="off">
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="kelas_id" class="form-label mb-1">Kelas</label>
                <select name="kelas_id" class="form-select form-select-smx roundedx @error('kelas_id') is-invalid @enderror" id="kelas_id">
                  <option disabled value>- Pilih kelas -</option>
                  @foreach ($datakelas as $kelas)
                    <option value="{{ $kelas->id }}" {{ $kelas->id == $datasiswa->kelas_id ? 'selected' : '' }}>{{ $kelas->kelas }}</option>
                  @endforeach
                </select>
                @error('kelas_id')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              
              <div class="row">
                <div class="col-6">
                  <div class="form-group mb-3">
                    <label for="spp_id" class="form-label mb-1">Tahun SPP</label>
                    <select name="spp_id" class="form-select form-select-smx roundedx @error('spp_id') is-invalid @enderror" id="spp_id">
                      <option disabled value>- Pilih tahun spp -</option>
                      @foreach ($dataspp as $spp)
                        <option value="{{ $spp->id }}" {{ $spp->id == $datasiswa->spp_id ? 'selected' : '' }}>{{ $spp->tahun }}</option>
                      @endforeach
                    </select>
                    @error('spp_id')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group mb-3">
                    <label for="level" class="form-label mb-1 mb-">Level</label>
                    <select name="level" class="form-select form-select-smx roundedx @error('level') is-invalid @enderror" id="level">
                      <option disabled value>- Level user -</option>
                      <option value="siswa">Siswa</option>
                    </select>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-12 col-md-6 col-lg-6 ps-2 ps-md-3 ps-lg-3 mt-0 mt-md-3 mt-lg-3">

              <div class="form-group mb-3">
                <label for="email" class="form-label mb-1">Email</label>
                <input type="text" name="email" class="form-control form-control-smx roundedx @error('email') is-invalid @enderror" value="{{ $datasiswa->email, old('email') }}" placeholder="Masukkan email" id="email" autocomplete="off">
                @error('email')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="username" class="form-label mb-1">Username</label>
                <input type="text" name="username" class="form-control form-control-smx roundedx @error('username') is-invalid @enderror" value="{{ $datasiswa->username, old('username') }}" placeholder="Masukkan username" id="username" autocomplete="off">
                @error('username')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="password" class="form-label mb-1">Password</label>
                <input type="password" name="password" class="form-control form-control-smx roundedx @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Masukkan password baru" id="password" autocomplete="off">
                <small class="ms-2 fst-italic text-sky" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Kosongkan untuk tidak mengubah password."><i class="bi bi-info-circle pe-1"></i>Info password</small>
                @error('password')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="telepon" class="form-label mb-1">Telepon</label>
                <input type="text" name="telepon" class="form-control form-control-smx roundedx @error('telepon') is-invalid @enderror" value="{{ $datasiswa->telepon, old('telepon') }}" placeholder="Masukkan nomor telepon" id="telepon" autocomplete="off">
                @error('telepon')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="alamat" class="form-label mb-1">Alamat</label>
                <input type="text" name="alamat" class="form-control form-control-smx roundedx @error('alamat') is-invalid @enderror" value="{{ $datasiswa->alamat, old('alamat') }}" placeholder="Masukkan alamat" id="alamat" autocomplete="off">
                @error('alamat')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              
              <div class="text-end ">
                <button type="submit" class="btnn btn-violet py-2 ps-4 mt-1 mb-3">Simpan <i class="bi bi-chevron-right px-1"></i></button>
              </div>
            </div>
            
          </form><!-- Vertical Form -->

        </div>
      </div>

    </div><!-- End Right side columns -->

    <!-- Left side columns -->
    <div class="col-lg-3">

    </div><!-- End Left side columns -->

  </div>
</section>
@endsection