@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Pengaturan</title>
@endsection
@section('content')
  
<div class="pagetitle d-none d-md-inline d-lg-inline">
  <h5 class="fw-semibold"><i class="bi bi-gear-wide-connected me-1"></i> Pengaturan</h5>
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

      <div id="pengaturan-card">

        <div class="cardxy shadow-sm border" id="border-me">
          <div class="row mx-0 mx-md-3 mx-lg-3 mb-2 mt-1 mt-md-4">
            <div class="col-5">
              <h6>Data Sekolah</h6>
            </div>
            <div class="col-7 d-flex flex-row-reverse">
            <form action="/pengaturan/{{ $datasekolah[0]->id }}" method="POST" id="form_pengaturan" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <h6 class="text-end fs-10 pb-2"><a href="#" onclick="document.getElementById('form_pengaturan').submit(); return false;">Simpan <i class="bi bi-check-lg ms-2"></i></a></h6>
            </div>
          </div>
          <div class="row mx-0 mx-md-3 mx-lg-3 mb-5">
            <div class="col-12 col-md-6 col-lg-6">
  
              <div class="col-12 mb-3">
                <div class="form-floating">
                  <input type="text" name="kepala_sekolah" class="form-control @error('kelapa_sekolah') is-invalid @enderror form-control-smx roundedx" value="{{ $datasekolah[0]->kepala_sekolah }}" id="floatingName" placeholder="Nama kepala sekolah">
                  <label for="floatingName">Kepala Sekolah</label>
                </div>
              </div>
  
              <div class="col-12 mb-3">
                <div class="form-floating">
                  <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror form-control-smx roundedx" value="{{ $datasekolah[0]->nip }}" id="floatingName" placeholder="NIP">
                  <label for="floatingName">NIP</label>
                </div>
              </div>
  
              <div class="col-12 mb-3">
                <div class="form-floating">
                  <input type="text" name="nama_sekolah" class="form-control @error('nama_sekolah') is-invalid @enderror form-control-smx roundedx" value="{{ $datasekolah[0]->nama_sekolah }}" id="floatingName" placeholder="Nama sekolah">
                  <label for="floatingName">Nama Sekolah</label>
                </div>
              </div>
              <div class="col-12 mb-3">
                <div class="form-floating">
                  <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror form-control-smx roundedx" value="{{ $datasekolah[0]->telepon }}" id="floatingName" placeholder="XXXX XXXX XXXX">
                  <label for="floatingName">Telepon</label>
                </div>
              </div>
              <div class="col-12 mb-3 mb-md-2">
                <div class="form-floating">
                  <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror form-control-smx roundedx" value="{{ $datasekolah[0]->alamat }}" id="floatingName" placeholder="Alamat sekolah">
                  <label for="floatingName">Alamat</label>
                </div>
              </div>
  
            </div>
  
            <div class="col-12 col-md-6 col-lg-6">
              
              <div class="col-12 border roundedx mb-2 text-center overflow-hidden">
                @if ($datasekolah[0]->logo > 1)
                  <img src="/img/img-me/{{ $datasekolah[0]->logo }}" alt="buktitransfer" class="" style="height: 277px; max-width:130px; object-fit: contain;" id="output">
                @else
                  <img src="/img/defaultbukti.jpg" alt="buktitransfer" class="" style="height: 277px; max-width:330px; object-fit: contain;" id="output">
                @endif
                <input type="hidden" name="pic" value="{{ $datasekolah[0]->logo }}">
              </div>
              <div class="col-12 mb-2">
                <div class="form-group mb-2">
                  <label for="logo" class="form-label mb-1">Upload Logo Sekolah</label>
                  <input type="file" class="form-control roundedx @error('logo') is-invalid @enderror" name="logo" id="logo" onchange="loadFile(event)" accept="image/*">
                  @error('logo')
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
  </div>
</section>
@endsection

@section('footer-me')
<footer id="footer" class="footer mt-5">
  <div class="copyright">
    &copy; Copyright 2023 - <strong><span>@Alfitka</span></strong>
  </div>
</footer> 
@endsection

@section('my-js')
<script type="text/javascript">
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endsection