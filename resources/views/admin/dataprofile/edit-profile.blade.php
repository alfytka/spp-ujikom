@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Edit Profile</title>
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
            <h6><i class="bi bi-chevron-left me-2"></i><a href="/profile">Kembali</a></h6>
          </div>
          <div class="col-7 d-flex flex-row-reverse">
            <h6 class="text-end"><a href="/profile/ubahpassword"><span class="d-none d-md-inline d-lg-inline">Edit</span> Password</a><i class="bi bi-chevron-right ms-2"></i></h6>
          </div>
        </div>

        <form action="/profile/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row mx-0 mx-md-4 mx-lg-4 mb-5">
            <div class="col-12 col-md-6 col-lg-6">
              <div class="mt-1 mb-4 d-flex flex-column align-items-center">
                @if (auth()->user()->foto > 1)
                  <img src="/img/photo-petugas/{{ auth()->user()->foto }}" alt="Profile" class="profile-img rounded-circle border" id="output">
                @else
                  <img src="/img/profile-img.jpg" alt="Profile" class="profile-img rounded-circle border" id="output">
                @endif
              </div>
              <div class="col-12 text-end">
                <button type="submit" class="btnn btn-ol-violet ps-4 rounded-4">Simpan <i class="bi bi-check2 fs-6 pe-1"></i></button>
              </div>
              <div class="col-12 mb-3">
                <label for="foto">Photo Profile</label>
                <input type="file" name="foto" id="foto" accept="image/*" onchange="loadFile(event)" class="form-control roundedx mt-1">
                <input type="hidden" name="pic" value="{{ auth()->user()->foto }}">
              </div>

              <div class="border-top mb-2"></div>

              <div class="col-12 mb-2">
                <label for="name">Nama Lengkap</label>
                <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                <input type="text" class="form-control form-control-smx mt-1 roundedx @error('name') is-invalid @enderror" autocomplete="off" name="name" value="{{ auth()->user()->name }}" id="name" placeholder="Masukkan nama lengkap">
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
              <div class="col-12 col-md-12 col-lg-12 detail-form">
                <div class="col-12 mb-2">
                  <label for="username">Username</label>
                  <input type="text" class="form-control form-control-smx roundedx mt-1 @error('username') is-invalid @enderror" autocomplete="off" name="username" value="{{ auth()->user()->username }}" id="username" placeholder="Masukkan username">
                  @error('username')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-12 mb-3">
                  <label for="email">Email</label>
                  <input type="text" class="form-control form-control-smx roundedx mt-1 @error('email') is-invalid @enderror" autocomplete="off" name="email" value="{{ auth()->user()->email }}" id="email" placeholder="Masukkan email">
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="border-top mb-2 "></div>

                <div class="col-12 mb-2">
                  <label for="telepon">Telepon</label>
                  <input type="text" class="form-control form-control-smx roundedx mt-1 @error('telepon') is-invalid @enderror" autocomplete="off" name="telepon" value="{{ auth()->user()->telepon }}" id="telepon" placeholder="Boleh lah nomor hpnya">
                  @error('telepon')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-12 mb-3">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control form-control-smx roundedx mt-1 @error('alamat') is-invalid @enderror" autocomplete="off" name="alamat" value="{{ auth()->user()->alamat }}" id="alamat" placeholder="Masukkan alamat">
                  @error('alamat')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@section('my-js')
<script type="text/javascript">
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endsection