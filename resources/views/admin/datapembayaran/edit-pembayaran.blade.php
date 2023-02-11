@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle mb-0">
    <h5 class="fw-semibold">Edit Pembayaran</h5> 
</div>

<section class="section dashboard mb-5">
  <div class="row">

    <!-- Right side columns -->
    <div class="col-lg-6">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-chevron-right"></i> Ubah Data Pembayaran</h5>

          <!-- Vertical Form -->
          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="/datapembayaran/{{ $datapembayaran->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12 col-md-12 col-lg-12 ">

              <div class="form-group mb-3">
                <label for="nisn" class="form-label mb-1">NISN</label>
                <input type="text" name="nisn" class="form-control form-control-smx roundedx @error('nisn') is-invalid @enderror" value="{{ $datapembayaran->userSiswa->nisn, old('nisn') }}" placeholder="Masukkan nisn" id="nisn" autocomplete="off">
                @error('nisn')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              {{-- <input type="hidden" name="petugas_id" class="form-control form-control-smx roundedx @error('petugas_id') is-invalid @enderror" value="{{ auth()->user()->id }}" id="petugas_id"> --}}

              <div class="form-group mb-3">
                <label for="siswa_id" class="form-label mb-1">Nama & Kelas Siswa</label>
                <select name="siswa_id" id="siswa_id" class="form-select form-select-smx roundedx @error('siswa_id') is-invalid @enderror">
                  <option disabled value>- Pilih nama siswa -</option>
                  @foreach ($datasiswa as $siswa)
                    {{-- <option disabled selected hidden>- Pilih nama siswa -</option> --}}
                    <option value="{{ $siswa->id }}" {{ $siswa->id == $datapembayaran->siswa_id ? 'selected' : '' }}>{{ $siswa->name }} - {{ $siswa->kelas->kelas }}</option>
                  @endforeach
                </select>
                @error('siswa_id')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="bulan_bayar" class="form-label mb-1">Bulan Bayar</label>
                <select name="bulan_bayar" id="bulan_bayar" class="form-select form-select-smx roundedx @error('bulan_bayar') is-invalid @enderror">
                  <option disabled value>- Pilih bulan bayar -</option>
                    <option disabled selected hidden>- Pilih bulan bayar -</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
                @error('bulan_bayar')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="tahun_bayar" class="form-label mb-1">Tahun Bayar</label>
                <select name="tahun_bayar" id="tahun_bayar" class="form-select form-select-smx roundedx @error('tahun_bayar') is-invalid @enderror">
                  <option disabled value>- Pilih tahun bayar -</option>
                    <option disabled selected hidden>- Pilih tahun bayar -</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
                @error('tahun_bayar')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="tgl_bayar" class="form-label mb-1">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" class="form-control form-control-smx roundedx @error('tgl_bayar') is-invalid @enderror" value="" placeholder="dd-mm-yyyy"id="tgl_bayar">
                @error('tgl_bayar')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="jumlah_bayar" class="form-label mb-1">Jumlah Bayar</label>
                <div class="input-group">
                  <span class="input-group-text">Rp</span>
                  <input type="text" name="jumlah_bayar" class="form-control form-control-smx rounded-r @error('jumlah_bayar') is-invalid @enderror" value="{{ old('jumlah_bayar') }}" placeholder="1000000" id="jumlah_bayar" autocomplete="off">
                  @error('jumlah_bayar')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              
              <div class="text-end ">
                <button type="submit" class="btnn btn-violet py-2 px-4 mt-1 mb-3">Simpan <i class="bi bi-chevron-right ps-1"></i></button>
              </div>

            </div>

          </form><!-- Vertical Form -->

        </div>
      </div>

    </div><!-- End Right side columns -->

    <!-- Left side columns -->
    <div class="col-lg-6">
      <div class="cardxy border-none shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h5 class="card-title ms-1">Detail Siswa </h5>
            </div>
            <div class="col-6 text-end">
              <h5 class="card-title"><a href="#">Lihat detail <i class="bi bi-chevron-right"></i></a></h5>
            </div>
          </div>

          <!-- Vertical Form -->
          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="#">
            <div class="col-12 col-md-12 col-lg-12 detail-form">

            {{-- <div class="card"> --}}
              <div class="card-body profile-card pt-3 d-flex flex-column align-items-center">
      
                <img src="/img/profile-img.jpg" alt="Profile"  class="profile-img rounded-circle">
                <h5 class="fw-semibold name mt-3">{{ $datapembayaran->userSiswa->name }}</h5>
                <h6 class="fw-normal name pt-0">Siswa</h6>
              </div>
            {{-- </div> --}}

              {{-- <div class="border-top  mb-3"></div> --}}
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-8">
                    <h6 class="mb-0 fw-normal">{{ $datapembayaran->userSiswa->nisn }}</h6>
                    <small class="title-profile">NISN</small>
                  </div>
                  <div class="col-4 my-auto text-end">
                    <i class="fs-5 bi bi-globe2 text-blue me-3"></i>
                  </div>
                </div>
              </div>

              <div class="col-12 mb-2">
                <h6 class="mb-0 fw-normal">{{ $datapembayaran->userSiswa->nis }}</h6>
                <small class="title-profile">NIS</small>
              </div>

              <div class="border-top mb-2"></div>

              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Nama Siswa</small>
                    <h6 class="mb-0">{{ $datapembayaran->userSiswa->name }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-4 bi bi-person text-blue me-3"></i>
                  </div>
                </div>
              </div>

              <div class="col-12 mb-3">
                <small class="title-profile-top">Kelas</small>
                <h6 class="mb-0 fw-normal">{{ $datapembayaran->userSiswa->kelas->kelas }}</h6>
              </div>

              <div class="border-top mb-2"></div>

              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-6">
                    <small class="title-profile-top">Tahun SPP</small>
                    <h6 class="mb-0">{{ $datapembayaran->userSiswa->spp->tahun }}</h6>
                  </div>
                  <div class="col-6 my-auto text-end">
                    <i class="fs-6 text-blue me-3">spp</i>
                  </div>
                </div>
              </div>

              <div class="col-12 mb-2">
                <small class="title-profile-top">Username</small>
                <h6 class="mb-0 fw-normal">{{ $datapembayaran->userSiswa->username }}</h6>
              </div>

              <div class="col-12 mb-3">
                <small class="title-profile-top">Email</small>
                <h6 class="mb-0 fw-normal">{{ $datapembayaran->userSiswa->email }}</h6>
              </div>

              <div class="border-top mb-2"></div>

              <div class="col-12">
                <div class="row">
                  <div class="col-8">
                    <small class="title-profile-top">Telepon</small>
                    <h6 class="mb-2">{{ $datapembayaran->userSiswa->telepon }}</h6>
                  </div>
                  <div class="col-4 my-auto text-end">
                    <i class="fs-5 bi bi-telephone text-blue me-3"></i>
                    <i class="fs-5 bi bi-chat text-blue me-3"></i>
                  </div>
                </div>
              </div>
              
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Alamat</small>
                    <h6 class="mb-2 fw-normal">{{ $datapembayaran->userSiswa->alamat }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-5 bi bi-geo-alt text-blue me-3"></i>
                  </div>
                </div>
              </div>

            </div>

          </form><!-- Vertical Form -->

        </div>
      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

@endsection

