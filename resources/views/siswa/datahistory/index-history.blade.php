@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Riwayat Pembayaran</title>
@endsection
@section('content')
  
<div class="pagetitle pt-1">
  <h5 class="fw-semibold">Riwayat Pembayaran</h5>
</div>

<input type="hidden" name="siswa_id" value="{{ auth()->user()->id }}">

<section class="section dashboard">
  <div class="row">
    <div class="col-lg-7">
      <p class="fs-12">Ini dia riwayat pembayaran spp yang selama ini kamu bayar.</p>

      @if (session()->has('info'))
        <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" style="border: 1px dashed #d4d4d8;" role="alert">
          <i class="bi bi-info-circle ms-1 py-0 my-0 me-2"></i>
          <span class="fs-12 fc-blues"><b>Terkirim - </b>{{ session('info') }}</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      

      <div class="accordion mb-5" id="accordionExample">
        @foreach ($riwayat as $pembayaran)
          <div class="accordion-item mb-2" style="border-radius: 15px; border-top: 1px solid #EBEEF4;">
            <h6 class="accordion-header" id="headingOne">
              <div class="accordion-button py-3" style="border-radius: 15px;" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $pembayaran->bulan_bayar }}{{ $pembayaran->tahun_bayar }}">
                <div class="icon-me">
                  <i class="text-primary fs-5">spp</i> 
                </div>
                <div class="d-block title-me ms-3">
                  <h6 class="my-auto fs-12">Pembayaran <span class="d-none d-md-inline d-lg-inline">SPP</span></h6>
                  <small class="fw-normal">
                    <i class="{{ $pembayaran->status == 'diproses' ? 'bi bi-shuffle text-success' : '' }}{{ $pembayaran->status == 'sukses' ? 'bi bi-check-circle-fill text-blue' : '' }}"></i>
                      {{ $pembayaran->bulan_bayar }}
                  </small>
                </div>
                <div class="d-block float-end accordion-btn">
                  <h6 class="my-auto fs-12 text-end">Rp{{ number_format($pembayaran->jumlah_bayar, 0, '.', '.')  }}</h6>
                  <small class="fw-normal float-end fs-sm">{{ $pembayaran->created_at->diffForHumans() }}</small>
                </div>
              </div>
            </h6>
            <div id="{{ $pembayaran->bulan_bayar }}{{ $pembayaran->tahun_bayar }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p class="fs-12 fw-bold mb-1">Detail Riwayat Pembayaran</p>
                <div class="col-12 mb-2">
                  <div class="row">
                    <div class="col-9">
                      <small class="title-profile-top">Waktu Transaksi</small>
                      <h6 class="mb-0 fw-normal fs-10">{{ $pembayaran->created_at }}</h6>
                    </div>
                    <div class="col-3 my-auto text-end">
                      <i class="fs-6 bi bi-clock text-blue me-3"></i>
                    </div>
                  </div>
                </div>

                <div class="border-top mb-1"></div>

                <div class="col-12 mb-2">
                  <div class="row">
                    <div class="col-6 {{ $pembayaran->jenis_pembayaran == 'siswa' ? 'me-1 me-md-0' : '' }} col-md-4">
                      <small class="title-profile-top">Status</small>
                      <h6 class="mb-0 fw-normal fs-10 {{ $pembayaran->status == 'diproses' ? 'text-success' : '' }}{{ $pembayaran->status == 'sukses' ? 'text-blue' : '' }}">{{ $pembayaran->status }}<i class="px-2 {{ $pembayaran->status == 'diproses' ? 'bi bi-shuffle text-success' : '' }}{{ $pembayaran->status == 'sukses' ? 'bi bi-check-circle-fill text-blue' : '' }}"></i></h6>
                    </div>
                    <div class="col-6 {{ $pembayaran->jenis_pembayaran == 'petugas' ? 'col-md-6' : 'col-md-4' }}">
                      <small class="title-profile-top">Jenis Pembayaran</small>
                      <h6 class="mb-0 fw-normal fs-10">{{ $pembayaran->jenis_pembayaran == 'siswa' ? 'Mandiri' : 'Langsung' }} oleh {{ $pembayaran->jenis_pembayaran }}</h6>
                    </div>
                    <div class="col-6 col-md-4">
                      @if ($pembayaran->jenis_pembayaran == 'siswa')
                        <small class="title-profile-top">Metode Pembayaran</small>
                        <h6 class="mb-0 fw-normal fs-10">{{ $pembayaran->metode_pembayaran }}</h6>
                      @endif
                    </div>
                  </div>
                  @if ($pembayaran->jenis_pembayaran == 'siswa')
                    <div class="row mt-3">
                      <div class="col-12">
                        <h6 class="fw-normal fst-italic fs-sm"><a href="#buktipembayaran" data-bs-toggle="collapse">Lihat bukti pembayaran saya <i class="bi bi-chevron-down"></i></a></h6>
                        <div class="collapse" id="buktipembayaran">
                          <div class="card card-body mb-0">
                            <img src="/img/photo-siswa/{{ $pembayaran->foto_bukti }}" class="roundedx mx-auto" style="max-width: 250px; max-height: 250px; object-fit: contain;" alt="buktipembayaran">
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                </div>

                <div class="border-top mb-1"></div>

                <div class="col-12 mb-2">
                  <div class="row">
                    <div class="col-9">
                      <small class="title-profile-top">Nama Petugas</small>
                      <h6 class="mb-0 fw-normal fs-10">{{ $pembayaran->petugas_id == '' ? '-' : $pembayaran->userPetugas->name }}</h6>
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
                      <h6 class="mb-0 fw-normal fs-10">{{ $pembayaran->userSiswa->name }}</h6>
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
                      <h6 class="mb-0 fw-normal fs-10">{{ $pembayaran->userSiswa->kelas->kelas }}</h6>
                    </div>
                    <div class="col-5">
                      <small class="title-profile-top">Tahun SPP</small>
                      <h6 class="mb-0 fw-normal fs-10">{{ $pembayaran->userSiswa->spp->tahun }}</h6>
                    </div>
                  </div>
                </div>

                <div class="border-top my-1"></div>

                <div class="col-12 mb-2">
                  <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                      <small class="title-profile-top">Tanggal Bayar</small>
                      <h6 class="mb-0 fw-normal fs-10">{{ $pembayaran->tgl_bayar }}</h6>
                    </div>
                    <div class="col-6 col-md-4 col-lg-4 mt-1">
                      <small class="title-profile-top d-block">Bulan Bayar</small>
                      <span class="badge btn-violet">{{ $pembayaran->bulan_bayar }}</span>
                    </div>
                    <div class="col-6 col-md-4 col-lg-4 mt-1">
                      <small class="title-profile-top d-block">Tahun Bayar</small>
                      <span class="badge btn-violet">{{ $pembayaran->tahun_bayar }}</span>
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
                      <h6 class="mb-0 text-violet">Rp{{ number_format($pembayaran->jumlah_bayar, 0, '.', '.') }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection