@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Entri Pembayaran</title>
@endsection
@section('content')
  
<div class="pagetitle mb-0">
    <h5 class="fw-semibold">Entri Pembayaran</h5> 
</div>

<section class="section dashboard mb-5">
  <div class="row">

    <!-- Right side columns -->
    <div class="col-lg-6">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title ms-2">Input Pembayaran</h5>

          <div class="border-dash-zinc mx-2 mb-2"></div>
          <!-- Vertical Form -->
            <form class="row g-3 mx-0 mx-md-1 mx-lg-1" action="/datapembayaran/create" method="GET" id="formSearch">
              {{-- @csrf --}}
              <div class="col-12 col-md-12 col-lg-12 ">
          
                <div class="form-group mb-3">
                  <label for="kelas" class="form-label mb-1">Kelas</label>
                  <select name="kelas" id="kelas" onchange="document.getElementById('formSearch').submit()" class="form-select form-select-smx roundedx @error('kelas') is-invalid @enderror">
                    <option disabled value>- Pilih kelas siswa -</option>
                    <option disabled selected hidden>- Pilih kelas siswa -</option>
                    <option value="">Semua kelas</option>
                    @foreach ($datakelas as $kelas)
                      <option value="{{ $kelas->id }}" {{ $kelas->id == request('kelas') ? 'selected' : '' }}>{{ $kelas->kelas }}</option>
                    @endforeach
                  </select>
                  @error('kelas')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                
              </div>
            </form>

            <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="" method="POST" id="getsiswa">
              {{-- @csrf --}}
              <div class="col-12 col-md-12 col-lg-12 ">
                
                {{-- <input type="hidden" name="siswa" value="{{ request('kelas') }}"> --}}
                {{-- <input type="hidden" name="petugas_id" class="form-control form-control-smx roundedx @error('petugas_id') is-invalid @enderror" value="{{ auth()->user()->id }}" id="petugas_id"> --}}

                <div class="form-group mb-0">
                  <label for="name" class="form-label mb-1">Nama Siswa</label>
                  <select name="name" id="name" onchange="document.location.href=this.options[this.selectedIndex].value;" class="form-select form-select-smx roundedx @error('name') is-invalid @enderror">
                    <option disabled value>- Pilih siswa dari kelas yang dipilih -</option>
                    <option disabled selected hidden>- Pilih siswa dari kelas yang dipilih -</option>
                    @foreach ($datasiswa as $siswa)
                      <option value="/datapembayaran/{{ $siswa->id }}/detail-siswa">{{ $siswa->name }}</option>
                    @endforeach
                  </select>
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                {{-- <small class="fst-italic">*masukkan data siswa untuk melanjutkan pembayaran</small> --}}
              </div>

            </form><!-- Vertical Form -->

            <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="{{ route('datapembayaran.store') }}" method="POST">
              @csrf
              <div class="col-12 col-md-12 col-lg-12 ">
                  
              <input type="hidden" name="petugas_id" class="form-control form-control-smx r" value="{{ auth()->user()->id }}">
              <input type="hidden" name="siswa_id" class="form-control form-control-smx r" value="{{ request('name') }}">

              <div class="form-group mb-3">
                <label for="tgl_bayar" class="form-label mb-1">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" class="form-control form-control-smx roundedx @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar" readonly>
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
                          <option value="{{ $bulan }}" {{ old('bulan_bayar') == $bulan ? 'selected' : '' }}>{{ $bulan }}</option>
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
                    <input type="text" class="form-control form-control-smx roundedx @error('tahun_bayar') is-invalid @enderror" name="tahun_bayar" placeholder="ex: 2020" autocomplete="off" id="tahun_bayar" readonly>
                    @error('tahun_bayar')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group mb-3">
                <label for="jumlah_bayar" class="form-label mb-1">Jumlah Bayar</label>
                <div class="input-group">
                  <span class="input-group-text">Rp</span>
                  <input type="text" name="jumlah_bayar" class="form-control form-control-smx rounded-r" 
                  placeholder="__ ___ __" id="jumlah_bayar" autocomplete="off" readonly>
                </div>
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
    <div class="col-lg-6">
      <div class="cardxy border-none shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h5 class="card-title ms-1">Detail Siswa </h5>
            </div>
          </div>

          
          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="#">
            <div class="col-12 col-md-12 col-lg-12 detail-form">

              <div class="card-body profile-card pt-3 d-flex flex-column align-items-center">
      
                <img src="/img/profile-img.jpg" alt="Profile" class="profile-img border rounded-circle">
                <h5 class="fw-semibold name mt-3">(i)</h5>
                <h6 class="fw-normal fs-10 pt-0 text-center">Pilih siswa yang akan melakukan pembayaran.</h6>
              </div>

            </div>

          </form>

        </div>
      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

@endsection