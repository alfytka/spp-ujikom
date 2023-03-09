@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Detail Siswa</title>
@endsection
@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold"><a type="button" onclick="history.back()" class="back-icon"><i class="bi bi-chevron-left back-icon"></i></a> <span class="ps-1">Data Siswa</span></h5>
</div>

<section class="section dashboard mb-5">
  <div class="row">
    <div class="col-md-7 col-lg-6">
      @if (session()->has('informasi'))
      <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
        <span><b>Berhasil - </b>{{ session('informasi') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif 

      <div class="cardxy border-none shadow-sm mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h5 class="card-title ms-1">Detail Siswa </h5>
            </div>
            <div class="col-6 text-end">
              @if (auth()->user()->level == 'admin')
              <div class="dropdown">
                <a data-bs-toggle="dropdown" class="card-title text-primary" type="button"> Edit <i class="bi bi-chevron-down ps-1"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="/datasiswa/{{ $datasiswa->id }}/edit" class="dropdown-item">Edit Data <i class="bi bi-pen float-end"></i></a></li>
                  <div class="border-bottom mx-2"></div>
                  <li><a href="/datasiswa/{{ $datasiswa->id }}/upload-photo" class="dropdown-item text-bluebook">Upload Foto <i class="bi bi-image float-end"></i></a></li>
                </ul>
              </div>
              @endif
            </div>
          </div>

          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="#">
            <div class="col-12 col-md-12 col-lg-12 detail-form">
              <div class="card-body profile-card pt-3 d-flex flex-column align-items-center">
                @if ($datasiswa->foto > 1)
                  <img src="/img/photo-siswa/{{ $datasiswa->foto }}" alt="Profile" class="profile-img rounded-circle border">
                @else
                  <img src="/img/profile-img.jpg" alt="Profile" class="profile-img rounded-circle border">
                @endif
                <h6 class="fw-semibold name mt-3 mb-1 text-center">{{ $datasiswa->name }}</h6>
                <h6 class="fw-normal fs-10 pt-0">Siswa</h6>
              </div>
              <div class="col-12 mb-1">
                <div class="row">
                  <div class="col-8">
                    <h6 class="mb-0 fw-normal fs-12">{{ $datasiswa->nisn }}</h6>
                    <small class="title-profile">NISN</small>
                  </div>
                  <div class="col-4 my-auto text-end">
                    <i class="fs-6 text-blue me-3">ID</i>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-1">
                <h6 class="mb-0 fw-normal fs-12">{{ $datasiswa->nis }}</h6>
                <small class="title-profile">NIS</small>
              </div>

              <div class="border-top mb-1"></div>

              <div class="col-12 mb-1">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Nama Siswa</small>
                    <h6 class="mb-0 fs-12 fw-normal">{{ $datasiswa->name }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-5 bi bi-universal-access text-blue me-3"></i>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <small class="title-profile-top">Kelas</small>
                <h6 class="mb-0 fw-normal fs-12">{{ $datasiswa->kelas->kelas }}</h6>
              </div>

              <div class="border-top mb-1"></div>

              <div class="col-12 mb-1">
                <div class="row">
                  <div class="col-6">
                    <small class="title-profile-top">Tahun SPP</small>
                    <h6 class="mb-0 fs-12 fw-normal">{{ $datasiswa->spp->tahun }}</h6>
                  </div>
                  <div class="col-6 my-auto text-end">
                    <i class="fs-6 text-blue me-3">spp</i>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-1">
                <small class="title-profile-top">Username</small>
                <h6 class="mb-0 fw-normal fs-12">{{ $datasiswa->username }}</h6>
              </div>
              <div class="col-12 mb-2">
                <small class="title-profile-top">Email</small>
                <h6 class="mb-0 fw-normal fs-12">{{ $datasiswa->email }}</h6>
              </div>

              <div class="border-top mb-1"></div>

              <div class="col-12">
                <div class="row">
                  <div class="col-8">
                    <small class="title-profile-top">Telepon</small>
                    <h6 class="mb-2 fs-12">{{ $datasiswa->telepon }}</h6>
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
                    <h6 class="mb-2 fw-normal fs-12">{{ $datasiswa->alamat }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-5 bi bi-geo-alt text-blue me-3"></i>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-7 col-lg-6">
      <div class="cardxy border-none shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h5 class="card-title ms-1 pb-2">Pembayaran Terakhir</h5>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-12 detail-form table-responsive" style="max-height: 195px;">
            <table class="table table-sm table-borderless">
              <tr class="fs-10 table-me">
                <td><i class="bi bi-clock"></i> Transaksi</td>
                <td>Bulan<span class="d-inline d-md-none">, Tahun</span></td>
                <td class="d-none d-md-block">Tahun</td>
                <td>Nominal <i class="d-none d-md-inline">(Rp)</i></td>
                <td></td>
              </tr>
              @foreach ($pembayaranterakhir as $pembayaran)
              <tr>
                <td>
                  <a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}">
                    <span class="badge badge-ol-violet">{{ $pembayaran->tgl_bayar }}</span>
                  </a>
                </td>
                <td>
                  <a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}">
                    <span class="badge badge-ol-violet">{{ $pembayaran->bulan_bayar }} <span class="d-inline d-md-none">- {{ $pembayaran->tahun_bayar }}</span></span>
                  </a>
                </td>
                <td class="d-none d-md-block">
                  <a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}">
                    <span class="badge badge-ol-violet">{{ $pembayaran->tahun_bayar }}</span>
                  </a>
                </td>
                <td>
                  <a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}">
                    <span class="badge badge-ol-violet"><span class="d-none d-md-inline">Rp</span>{{ number_format($pembayaran->jumlah_bayar, 0, '.', '.') }}</span>
                  </a>
                </td>
                <td class="d-none d-md-inline">
                  <a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}">
                    <i class="bi bi-chevron-right text-dark"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection