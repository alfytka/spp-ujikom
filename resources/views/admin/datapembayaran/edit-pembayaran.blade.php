@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Edit Pembayaran</title>
@endsection
@section('content')
  
<div class="pagetitle mb-0">
  <h5 class="fw-semibold"><a href="{{ route('datapembayaran.index') }}" class="back-icon"><i class="bi bi-chevron-left back-icon"></i></a> <span class="ps-1">Edit Pembayaran</span></h5> 
</div>

<section class="section dashboard mb-5">
  <div class="row">
    <div class="col-lg-6">
      <div class="cardxy shadow-sm mb-4">
        <div class="card-body">
          <h5 class="card-title ms-1">Edit Data Pembayaran</h5>
          <div class="border-dash-zinc mx-2 mb-2"></div>
          <form class="row g-3 mx-0 mx-md-1 mx-lg-1" action="/datapembayaran/create" method="GET" id="formSearch">
            {{-- @csrf --}}
            <div class="col-12 col-md-12 col-lg-12 ">
              {{-- <div class="form-group mb-3">
                <label for="kelas" class="form-label mb-1">Kelas</label>
                <select name="kelas" id="kelas" onchange="document.getElementById('formSearch').submit()" class="form-select form-select-smx roundedx @error('kelas') is-invalid @enderror" disabled>
                  <option disabled value>- Pilih kelas siswa -</option>
                  <option disabled selected hidden>- Pilih kelas siswa -</option>
                  <option value="">Semua kelas</option>
                  @foreach ($datakelas as $kelas)
                    <option value="{{ $kelas->id }}" {{ $kelas->id == $datapembayaran->userSiswa->kelas_id ? 'selected' : '' }}>{{ $kelas->kelas }}</option>
                  @endforeach
                </select>
                @error('kelas')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div> --}}
            </div>
          </form>

          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="/datapembayaran" method="POST" id="getsiswa">
            @csrf
            <div class="col-12 col-md-12 col-lg-12 ">
              <div class="form-group mb-0">
                <label for="name" class="form-label mb-1">Nama Siswa</label>
                <select name="name" id="name" onchange="document.location.href=this.options[this.selectedIndex].value;" class="form-select form-select-smx roundedx @error('name') is-invalid @enderror" disabled>
                  <option disabled value>- Pilih siswa dari kelas yang dipilih -</option>
                  <option disabled selected hidden>- Pilih siswa dari kelas yang dipilih -</option>
                  @foreach ($siswas as $siswa)
                    <option value="/datapembayaran/{{ $siswa->id }}/detail-siswa" {{ $siswa->id == $datapembayaran->siswa_id ? 'selected' : '' }}>{{ $siswa->name }} - {{ $siswa->kelas->kelas }}</option>
                  @endforeach
                </select>
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </form>

          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="/datapembayaran/{{ $datapembayaran->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12 col-md-12 col-lg-12 ">
              <div class="form-group mb-3">
                <label for="tgl_bayar" class="form-label mb-1">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" value="{{ $datapembayaran->tgl_bayar }}" class="form-control form-control-smx roundedx @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar">
                @error('tgl_bayar')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div class="row">
                <div class="col-6 pe-2">
                  <div class="form-group mb-3">
                    <label for="bulan_bayar" class="form-label mb-1">Bulan Bayar</label>
                    <select name="bulan_bayar" id="bulan_bayar" class="form-select form-select-smx roundedx @error('bulan_bayar') is-invalid @enderror">
                      <option disabled value>- Pilih bulan bayar -</option>
                        <option disabled selected hidden>- Pilih bulan bayar -</option>
                        @foreach ($bulans as $bulan)
                          <option value="{{ $bulan }}" {{ $bulan == $datapembayaran->bulan_bayar ? 'selected' : '' }}>{{ $bulan }}</option>
                        @endforeach
                    </select>
                    @error('bulan_bayar')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-6 ps-2  ">
                  <div class="form-group mb-3">
                    <label for="tahun_bayar" class="form-label mb-1">Tahun Bayar</label>
                    <input type="text" class="form-control form-control-smx roundedx @error('tahun_bayar') is-invalid @enderror" name="tahun_bayar" value="{{ $datapembayaran->tahun_bayar }}" placeholder="ex: 2020" autocomplete="off" id="tahun_bayar">
                    @error('tahun_bayar')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="jumlah_bayar" class="form-label mb-1">Jumlah Bayar</label>
                <div class="input-group">
                  <span class="input-group-text text-blue fw-bold">Rp</span>
                  <input type="text" name="jumlah_bayar" class="form-control form-control-smx rounded-r @error('jumlah_bayar') is-invalid @enderror" value="{{ number_format($datapembayaran->userSiswa->spp->nominal, 0, '.', '.') }}" placeholder="1000000" id="jumlah_bayar" autocomplete="off" readonly>
                  @error('jumlah_bayar')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="text-end ">
                <button type="submit" class="btnn btn-violet py-2 ps-4 mb-2">Simpan <i class="bi bi-chevron-right px-1"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="cardxy border-none shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h5 class="card-title ms-1">Detail Siswa</h5>
            </div>
            <div class="col-6 text-end">
              <h5 class="card-title"><a href="/datasiswa/{{ $datapembayaran->userSiswa->id }}">Lihat detail <i class="bi bi-chevron-right"></i></a></h5>
            </div>
          </div>

          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="#">
            <div class="col-12 col-md-12 col-lg-12 detail-form">
              <div class="card-body profile-card pt-3 d-flex flex-column align-items-center">
                @if ($datapembayaran->userSiswa->foto > 1)
                  <img src="/img/photo-siswa/{{ $datapembayaran->userSiswa->foto }}" alt="Profile" class="profile-img rounded-circle border">
                @else
                  <img src="/img/profile-img.jpg" alt="Profile" class="profile-img rounded-circle border">
                @endif
                <h6 class="fw-semibold name mt-3 mb-1 text-center">{{ $datapembayaran->userSiswa->name }}</h6>
                <h6 class="fw-normal fs-10 pt-0">Siswa</h6>
              </div>
  
              <div class="col-12 mb-1">
                <div class="row">
                  <div class="col-8">
                    <h6 class="mb-0 fw-normal fs-12">{{ $datapembayaran->userSiswa->nisn }}</h6>
                    <small class="title-profile">NISN</small>
                  </div>
                  <div class="col-4 my-auto text-end">
                    <i class="fs-6 text-blue me-3">ID</i>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-1">
                <h6 class="mb-0 fw-normal fs-12">{{ $datapembayaran->userSiswa->nis }}</h6>
                <small class="title-profile">NIS</small>
              </div>

              <div class="border-top mb-1"></div>

              <div class="col-12 mb-1">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Nama Siswa</small>
                    <h6 class="mb-0 fs-12 fw-normal">{{ $datapembayaran->userSiswa->name }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-5 bi bi-universal-access text-blue me-3"></i>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <small class="title-profile-top">Kelas</small>
                <h6 class="mb-0 fw-normal fs-12">{{ $datapembayaran->userSiswa->kelas->kelas }}</h6>
              </div>
              {{-- <div class="border-top mb-1"></div> --}}
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection