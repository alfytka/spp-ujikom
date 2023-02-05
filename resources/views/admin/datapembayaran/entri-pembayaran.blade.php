@extends('layouts.admin.kerangka')

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
          <h5 class="card-title"><i class="bi bi-chevron-right"></i> Input Pembayaran</h5>

          <!-- Vertical Form -->
          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="{{ route('datapembayaran.create') }}" method="POST">
            @csrf
            <div class="col-12 col-md-12 col-lg-12 ">

              <div class="form-group mb-3">
                <label for="nisn" class="form-label mb-1">NISN</label>
                <input type="text" name="nisn" class="form-control form-control-smx roundedx @error('nisn') is-invalid @enderror" value="{{ old('nisn') }}" placeholder="Masukkan nisn" id="nisn" autocomplete="off">
                @error('nisn')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <input type="hidden" name="petugas_id" class="form-control form-control-smx roundedx @error('petugas_id') is-invalid @enderror" value="{{ old('petugas_id') }}" id="petugas_id">

              <div class="form-group mb-3">
                <label for="name" class="form-label mb-1">Nama & Kelas Siswa</label>
                <select name="name" id="name" class="form-select form-select-smx roundedx @error('name') is-invalid @enderror">
                  <option disabled value>- Pilih nama siswa -</option>
                  @foreach ($datasiswa as $siswa)
                    <option disabled selected hidden>- Pilih nama siswa -</option>
                    <option value="{{ $siswa->id }}">{{ $siswa->name }} - {{ $siswa->kelas->kelas }}</option>
                  @endforeach
                </select>
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="kelas" class="form-label mb-1">Kelas</label>
                <input type="text" name="kelas_id" class="form-control form-control-smx roundedx @error('kelas') is-invalid @enderror" value="{{ old('kelas') }}" placeholder="Kelas" id="kelas" autocomplete="off">
                @error('kelas')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="name" class="form-label mb-1">Tahun SPP</label>
                <input type="text" name="name" class="form-control form-control-smx roundedx @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama petugas" id="name" autocomplete="off">
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="name" class="form-label mb-1">Nominal SPP</label>
                <input type="text" name="name" class="form-control form-control-smx roundedx @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama petugas" id="name" autocomplete="off">
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="tgl_bayar" class="form-label mb-1">Tanggal Bayar</label>
                <input type="date" name="date" class="form-control form-control-smx roundedx @error('tgl_bayar') is-invalid @enderror" value="" placeholder="dd-mm-yyyy" value="<?= date('m-d-Y') ?>" id="tgl_bayar">
                @error('tgl_bayar')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="tgl_bayar" class="form-label mb-1">Jumlah Bayar</label>
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
                <h5 class="fw-semibold name mt-3">Kamal</h5>
                <h6 class="fw-normal name pt-0">Siswa</h6>
              </div>
            {{-- </div> --}}

              {{-- <div class="border-top  mb-3"></div> --}}
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-8">
                    <h6 class="mb-0 fw-normal">3013282831</h6>
                    <small class="title-profile">NISN</small>
                  </div>
                  <div class="col-4 my-auto text-end">
                    <i class="fs-5 bi bi-globe2 text-blue me-3"></i>
                  </div>
                </div>
              </div>

              <div class="col-12 mb-2">
                <h6 class="mb-0 fw-normal">10.2021.222</h6>
                <small class="title-profile">NIS</small>
              </div>

              <div class="border-top mb-2"></div>

              <div class="col-12 mb-2">
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

              <div class="col-12 mb-3">
                <small class="title-profile-top">Kelas</small>
                <h6 class="mb-0 fw-normal">XII AKL 3</h6>
              </div>

              <div class="border-top mb-2"></div>

              <div class="col-12 mb-2">
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

              <div class="col-12 mb-2">
                <small class="title-profile-top">Username</small>
                <h6 class="mb-0 fw-normal">Kamaladan</h6>
              </div>

              <div class="col-12 mb-3">
                <small class="title-profile-top">Email</small>
                <h6 class="mb-0 fw-normal">kamal@yahoo.com</h6>
              </div>

              <div class="border-top mb-2"></div>

              <div class="col-12">
                <div class="row">
                  <div class="col-8">
                    <small class="title-profile-top">Telepon</small>
                    <h6 class="mb-2">08532173827</h6>
                  </div>
                  <div class="col-4 my-auto text-end">
                    <i class="fs-5 bi bi-telephone text-blue me-3"></i>
                  </div>
                </div>
              </div>
              
              <div class="col-12 mb-2">
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
      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

@endsection




