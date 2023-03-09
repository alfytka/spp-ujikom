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
    <div class="col-lg-6">
      <div class="cardxy shadow-sm mb-4">
        <div class="card-body">
          <h5 class="card-title ms-1">Detail Pembayaran</h5>
          <form class="row g-3 mx-0 mb-1" action="{{ route('datapembayaran.store') }}" method="POST">
            @csrf
            <div class="col-12 col-md-12 col-lg-12">
              <div class="border-dash-zinc mt-1 mb-2"></div>
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-9">
                    <small class="title-profile-top">Waktu Transaksi</small>
                    <h6 class="mb-0 fw-normal fs-10">{{ $datahistory->created_at }}</h6>
                  </div>
                  <div class="col-3 my-auto text-end">
                    <i class="fs-6 bi bi-clock text-blue me-3"></i>
                  </div>
                </div>
              </div>

              <div class="border-top mb-1"></div>

              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-6 {{ $datahistory->jenis_pembayaran == 'siswa' ? 'me-1 me-md-0' : '' }} col-md-4">
                    <small class="title-profile-top">Status</small>
                    <h6 class="mb-0 fw-normal fs-10 {{ $datahistory->status == 'diproses' ? 'text-success' : '' }}{{ $datahistory->status == 'sukses' ? 'text-violet' : '' }}">{{ $datahistory->status }}<i class="px-2 {{ $datahistory->status == 'diproses' ? 'bi bi-shuffle text-success' : '' }}{{ $datahistory->status == 'sukses' ? 'bi bi-check-circle-fill text-violet' : '' }}"></i></h6>
                  </div>
                  <div class="col-6 {{ $datahistory->jenis_pembayaran == 'petugas' ? 'col-md-6' : 'col-md-4' }}">
                    <small class="title-profile-top">Jenis Pembayaran</small>
                    <h6 class="mb-0 fw-normal fs-10">{{ $datahistory->jenis_pembayaran == 'siswa' ? 'Mandiri' : 'Langsung' }} oleh {{ $datahistory->jenis_pembayaran }}</h6>
                  </div>
                  <div class="col-6 col-md-4">
                    @if ($datahistory->jenis_pembayaran == 'siswa')
                    <small class="title-profile-top">Metode Pembayaran</small>
                    <h6 class="mb-0 fw-normal fs-10">{{ $datahistory->metode_pembayaran }}</h6>
                    @endif
                  </div>
                </div>
                @if ($datahistory->jenis_pembayaran == 'siswa')
                  <div class="row mt-3">
                    <div class="col-12">
                      <h6 class="fw-normal fst-italic fs-sm"><a href="#buktipembayaran" data-bs-toggle="collapse">Lihat bukti pembayaran siswa <i class="bi bi-chevron-down"></i></a></h6>
                      <div class="collapse" id="buktipembayaran">
                        <div class="card card-body mb-0">
                          <img src="/img/photo-siswa/{{ $datahistory->foto_bukti }}" class="roundedx mx-auto" style="max-width: 250px; max-height: 250px; object-fit: contain;" alt="buktipembayaran">
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
                    <h6 class="mb-0 fw-normal fs-10">{{ $datahistory->petugas_id == '' ? '-' : $datahistory->userPetugas->name }}</h6>
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
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="cardxy border-none mb-4 shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h5 class="card-title ms-1 pb-2">Pembayaran Terakhir <u>{{ $datahistory->userSiswa->username }}</u></h5>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-12 detail-form table-responsive">
            <table class="table table-sm table-borderless">
              <tr class="fs-10 table-me">
                <td><i class="bi bi-clock"></i> Transaksi</td>
                <td>Bulan<span class="d-inline d-md-none">, Tahun</span></td>
                <td class="d-none d-md-block">Tahun</td>
                <td>Nominal</td>
                <td></td>
              </tr>
              @foreach ($pembayarans as $latest)
              <tr>
                <td>
                  <a href="/history/{{ $latest->id }}/{{ $latest->userSiswa->id }}">
                    <span class="badge {{ $latest->bulan_bayar == $datahistory->bulan_bayar ? 'btn-violet' : 'btn-ol-violet' }}">{{ $latest->tgl_bayar }}</span>
                  </a>
                </td>
                <td>
                  <a href="/history/{{ $latest->id }}/{{ $latest->userSiswa->id }}">
                    <span class="badge {{ $latest->bulan_bayar == $datahistory->bulan_bayar ? 'btn-violet' : 'btn-ol-violet' }}">{{ $latest->bulan_bayar }} <span class="d-inline d-md-none">- {{ $latest->tahun_bayar }}</span></span>
                  </a>
                </td>
                <td class="d-none d-md-block">
                  <a href="/history/{{ $latest->id }}/{{ $latest->userSiswa->id }}">
                    <span class="badge {{ $latest->bulan_bayar == $datahistory->bulan_bayar ? 'btn-violet' : 'btn-ol-violet' }}">{{ $latest->tahun_bayar }}</span>
                  </a>
                </td>
                <td>
                  <a href="/history/{{ $latest->id }}/{{ $latest->userSiswa->id }}">
                    <span class="badge {{ $latest->bulan_bayar == $datahistory->bulan_bayar ? 'btn-violet' : 'btn-ol-violet' }}"><span class="d-none d-md-inline">Rp</span>{{ number_format($latest->jumlah_bayar, 0, '.', '.')  }}</span>
                  </a>
                </td>
                <td class="d-none d-md-inline">
                  <a href="/history/{{ $latest->id }}/{{ $latest->userSiswa->id }}">
                    <i class="bi bi-chevron-right"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>

      <div class="cardxy border-none shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h5 class="card-title ms-1">Detail Siswa </h5>
            </div>
            <div class="col-6 text-end">
              <h5 class="card-title"><a href="/datasiswa/{{ $datahistory->userSiswa->id }}">Lihat detail <i class="bi bi-chevron-right"></i></a></h5>
            </div>
          </div>

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
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>

@endsection
