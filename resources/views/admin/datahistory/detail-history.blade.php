@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Detail Riwayat Pembayaran</title>
@endsection
@section('content')
  
<div class="pagetitle mb-0">
    <h5 class="fw-semibold"><a href="{{ route('history.index') }}" class="back-icon"><i class="bi bi-chevron-left back-icon"></i></a> <span class="ps-1">Detail History Pembayaran</span></h5> 
</div>

<section class="section dashboard mb-5">
  <div class="row">

    <!-- Right side columns -->
    <div class="col-lg-6">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title ms-1">Detail Pembayaran</h5>

          <!-- Vertical Form -->
        
            <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="" method="POST">
              @csrf
              <div class="col-12 col-md-12 col-lg-12 ">

              <div class="border-top mt-1 mb-2"></div>

              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Waktu Transaksi</small>
                    <h6 class="mb-0 fw-normal fs-10">{{ $datahistory->created_at }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-5 bi bi-clock text-blue me-3"></i>
                  </div>
                </div>
              </div>

              <div class="border-top mb-1"></div>

              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Nama Petugas</small>
                    <h6 class="mb-0 fw-normal fs-10">{{ $datahistory->userPetugas->name }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-5 bi bi-person text-blue me-3"></i>
                  </div>
                </div>
              </div>

              <div class="border-top my-1"></div>

              <div class="col-12 mb-1">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Nama Siswa</small>
                    <h6 class="mb-0 fw-normal fs-10">{{ $datahistory->userSiswa->name }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-5 bi bi-person text-blue me-3"></i>
                  </div>
                </div>
              </div>

              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-4">
                    <small class="title-profile-top">Kelas</small>
                    <h6 class="mb-0 fw-normal fs-10">{{ $datahistory->userSiswa->kelas->kelas }}</h6>
                  </div>
                  <div class="col-5">
                    <small class="title-profile-top">Tahun SPP</small>
                    <h6 class="mb-0 fw-normal fs-10">{{ $datahistory->userSiswa->spp->tahun }}</h6>
                  </div>
                </div>
              </div>

              <div class="border-top my-1"></div>

              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-12 col-md-4 col-lg-4">
                    <small class="title-profile-top">Tanggal Bayar</small>
                    <h6 class="mb-0 fw-normal fs-10">{{ $datahistory->tgl_bayar }}</h6>
                  </div>
                  <div class="col-6 col-md-4 col-lg-4 mt-1">
                    <small class="title-profile-top d-block">Bulan Bayar</small>
                    <span class="badge btn-violet">{{ $datahistory->bulan_bayar }}</span>
                  </div>
                  <div class="col-6 col-md-4 col-lg-4 mt-1">
                    <small class="title-profile-top d-block">Tahun Bayar</small>
                    <span class="badge btn-violet">{{ $datahistory->tahun_bayar }}</span>
                  </div>
                </div>
              </div>

              <div class="border-dash mt-2 mb-1"></div>

              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-4 my-auto">
                    <i class="ms-2 fs-5 bi bi-arrow-return-right text-violet"></i>
                  </div>
                  <div class="col-8 text-end">
                    <small class="title-profile-top">Nominal Bayar</small>
                    <h6 class="mb-0 text-violet">Rp{{ number_format($datahistory->jumlah_bayar, 0, '.', '.') }}</h6>
                  </div>
                </div>
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

              <div class="card-body profile-card pt-3 d-flex flex-column align-items-center">
                @if ($datahistory->userSiswa->foto > 1)
                  <img src="/img/photo-siswa/{{ $datahistory->userSiswa->foto }}" alt="Profile" class="profile-img rounded-circle border">
                @else
                  <img src="/img/profile-img.jpg" alt="Profile" class="profile-img rounded-circle border">
                @endif
                <h6 class="fw-semibold name mt-3 mb-1 text-center">{{ $datahistory->userSiswa->name }}</h6>
                <h6 class="fw-normal fs-10 pt-0">Siswa</h6>
              </div>
  
                {{-- <div class="border-top  mb-3"></div> --}}
                <div class="col-12 mb-1">
                  <div class="row">
                    <div class="col-8">
                      <h6 class="mb-0 fw-normal fs-12">{{ $datahistory->userSiswa->nisn }}</h6>
                      <small class="title-profile">NISN</small>
                    </div>
                    <div class="col-4 my-auto text-end">
                      <i class="fs-6 text-blue me-3">ID</i>
                    </div>
                  </div>
                </div>
  
                <div class="col-12 mb-1">
                  <h6 class="mb-0 fw-normal fs-12">{{ $datahistory->userSiswa->nis }}</h6>
                  <small class="title-profile">NIS</small>
                </div>
  
                <div class="border-top mb-1"></div>
  
                <div class="col-12 mb-1">
                  <div class="row">
                    <div class="col-9">
                      <small class="title-profile-top">Nama Siswa</small>
                      <h6 class="mb-0 fs-12 fw-normal">{{ $datahistory->userSiswa->name }}</h6>
                    </div>
                    <div class="col-3 my-auto text-end">
                      <i class="fs-5 bi bi-universal-access text-blue me-3"></i>
                    </div>
                  </div>
                </div>
  
                <div class="col-12 mb-2">
                  <small class="title-profile-top">Kelas</small>
                  <h6 class="mb-0 fw-normal fs-12">{{ $datahistory->userSiswa->kelas->kelas }}</h6>
                </div>
  
                <div class="border-top mb-1"></div>
  
                <div class="col-12 mb-1">
                  <div class="row">
                    <div class="col-6">
                      <small class="title-profile-top">Tahun SPP</small>
                      <h6 class="mb-0 fs-12 fw-normal">{{ $datahistory->userSiswa->spp->tahun }}</h6>
                    </div>
                    <div class="col-6 my-auto text-end">
                      <i class="fs-6 text-blue me-3">spp</i>
                    </div>
                  </div>
                </div>
  
                <div class="col-12 mb-1">
                  <small class="title-profile-top">Username</small>
                  <h6 class="mb-0 fw-normal fs-12">{{ $datahistory->userSiswa->username }}</h6>
                </div>
  
                <div class="col-12 mb-2">
                  <small class="title-profile-top">Email</small>
                  <h6 class="mb-0 fw-normal fs-12">{{ $datahistory->userSiswa->email }}</h6>
                </div>
  
                <div class="border-top mb-1"></div>
  
                <div class="col-12">
                  <div class="row">
                    <div class="col-8">
                      <small class="title-profile-top">Telepon</small>
                      <h6 class="mb-2 fs-12">{{ $datahistory->userSiswa->telepon }}</h6>
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
                      <h6 class="mb-2 fw-normal fs-12">{{ $datahistory->userSiswa->alamat }}</h6>
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
