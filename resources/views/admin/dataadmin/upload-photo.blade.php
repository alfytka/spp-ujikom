@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Upload Foto Admin</title>
@endsection
@section('content')
  
<div class="pagetitle mb-3 mt-2">
  <h6 class="fw-normal"><a href="/dataadmin/{{ $dataadmin->id }}" class="back-icon"><i class="bi bi-chevron-left back-icon"></i></a> <span class="ps-1">Kembali</span></h6>
</div>

<section class="section dashboard mb-5">
  <div class="row">
    <div class="col-md-7 col-lg-6">
      <div class="cardxy border-none shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h5 class="card-title ms-1">Upload Foto Admin</h5>
            </div>
          </div>
          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="/dataadmin/{{ $dataadmin->id }}/upload-photo" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12 col-md-12 col-lg-12 detail-form">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                @if ($dataadmin->foto > 1)
                  <img src="/img/photo-petugas/{{ $dataadmin->foto }}" alt="Profile" class="profile-img rounded-circle border" id="output">
                @else
                  <img src="/img/profile-img.jpg" alt="Profile" class="profile-img rounded-circle border" id="output">
                @endif
                <h6 class="fw-semibold name mt-3 mb-0 text-center">{{ $dataadmin->name }}</h6>
                <small class="name">Admin</small>
              </div>
              <div class="form-group mb-2">
                <label for="foto" class="form-label mb-1">Upload Foto</label>
                <input type="file" name="foto" accept="image/*" onchange="loadFile(event)" class="form-control roundedx @error('foto') is-invalid @enderror" id="foto">
                @error('foto')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <input type="hidden" name="pic" value="{{ $dataadmin->foto }}">
              <input type="hidden" name="petugas_id" value="{{ $dataadmin->id }}">
              <div class="text-end">
                <button type="submit" class="btnn btn-violet py-2 ps-4 mt-1 mb-2">Simpan <i class="bi bi-chevron-right px-1"></i></button>
              </div>
            </div>
          </form>
        </div>
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

