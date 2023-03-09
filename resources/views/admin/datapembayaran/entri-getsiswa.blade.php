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
    <div class="col-lg-6">
      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title ms-2">Input Pembayaran</h5>
          <form class="row g-3 mx-0 mx-md-1 mx-lg-1" action="/entri-pembayaran" method="GET" id="formSearch">
            {{-- @csrf --}}
            <div class="col-12 col-md-12 col-lg-12 ">
              <div class="form-group mb-3">
                <label for="kelas" class="form-label mb-1">Kelas</label>
                <select name="kelas" id="kelas" onchange="document.getElementById('formSearch').submit()" class="form-select form-select-smx roundedx @error('kelas') is-invalid @enderror">
                  <option disabled value>- Pilih kelas siswa -</option>
                  <option disabled selected hidden>- Pilih kelas siswa -</option>
                  <option value="">Semua kelas</option>
                  @foreach ($datakelas as $kelas)
                    <option value="{{ $kelas->id }}" {{ $kelas->id == $datasiswa->kelas_id ? 'selected' : '' }}>{{ $kelas->kelas }}</option>
                  @endforeach
                </select>
                @error('kelas')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </form>

          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="/entri-pembayaran" method="POST" id="getsiswa">
            @csrf
            <div class="col-12 col-md-12 col-lg-12 ">
              <div class="form-group mb-0">
                <label for="name" class="form-label mb-1">Nama Siswa</label>
                <select name="name" id="name" onchange="document.location.href=this.options[this.selectedIndex].value;" class="form-select form-select-smx roundedx @error('name') is-invalid @enderror">
                  <option disabled value>- Pilih siswa dari kelas yang dipilih -</option>
                  <option disabled selected hidden>- Pilih siswa dari kelas yang dipilih -</option>
                  @foreach ($siswas as $siswa)
                    <option value="/entri-pembayaran/{{ $siswa->id }}/detail-siswa" {{ $siswa->id == $datasiswa->id ? 'selected' : '' }}>{{ $siswa->name }}</option>
                  @endforeach
                </select>
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </form>

          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="{{ route('datapembayaran.store') }}" method="POST">
            @csrf
            <div class="col-12 col-md-12 col-lg-12 ">
              <input type="hidden" name="petugas_id" class="form-control form-control-smx" value="{{ auth()->user()->id }}">
              <input type="hidden" name="siswa_id" class="form-control form-control-smx" value="{{ $datasiswa->id }}">

              <div class="form-group mb-3">
                <label for="tgl_bayar" class="form-label mb-1">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" value="{{ old('tgl_bayar') }}" class="form-control form-control-smx roundedx @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar">
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
                          {{-- <option value="{{ $bulan }}" {{ $bulan == $disabledm ? 'disabled' : '' }}></option> --}}
                          @if (in_array($bulan, $disabledm))
                            <option value="{{ $bulan }}" disabled>{{ $bulan }}</option>
                          @else
                            <option value="{{ $bulan }}">{{ $bulan }}</option>
                          @endif
                        @endforeach
                    </select>
                    @error('bulan_bayar')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-6 ps-2">
                  <div class="form-group mb-3">
                    <label for="tahun_bayar" class="form-label mb-1">Tahun Bayar</label>
                    <input type="text" class="form-control form-control-smx roundedx @error('tahun_bayar') is-invalid @enderror" value="{{ old('tahun_bayar') }}" name="tahun_bayar" placeholder="ex: 2020" autocomplete="off" id="tahun_bayar">
                    @error('tahun_bayar')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group mb-3">
                <label for="jumlah_bayar" class="form-label mb-1">Jumlah Bayar</label>
                <div class="input-group">
                  <span class="input-group-text text-blue fw-nold">Rp</span>
                  <input type="text" name="jumlah_bayar" class="form-control form-control-smx rounded-r @error('jumlah_bayar') is-invalid @enderror" value="{{ number_format($datasiswa->spp->nominal, 0, '.', '.') }}" placeholder="1000000" id="jumlah_bayar" autocomplete="off" readonly>
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
      <div class="cardxy border-none mb-4 shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h5 class="card-title ms-1 pb-2">Pembayaran Terakhir <u>{{ $datasiswa->username }}</u></h5>
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
              @foreach ($pembayarans as $pembayaran)
              <tr>
                <td>
                  <a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}">
                    <span class="badge btn-ol-violet">{{ $pembayaran->tgl_bayar }}</span>
                  </a>
                </td>
                <td>
                  <a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}">
                    <span class="badge btn-ol-violet">{{ $pembayaran->bulan_bayar }} <span class="d-inline d-md-none">- {{ $pembayaran->tahun_bayar }}</span></span>
                  </a>
                </td>
                <td class="d-none d-md-block">
                  <a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}">
                    <span class="badge btn-ol-violet">{{ $pembayaran->tahun_bayar }}</span>
                  </a>
                </td>
                <td>
                  <a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}">
                    <span class="badge btn-ol-violet"><span class="d-none d-md-inline">Rp</span>{{ number_format($pembayaran->jumlah_bayar, 0, '.', '.')  }}</span>
                  </a>
                </td>
                <td class="d-none d-md-inline">
                  <a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}">
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
              <h5 class="card-title ms-1">Detail Siswa</h5>
            </div>
            <div class="col-6 text-end">
              <h5 class="card-title"><a href="/datasiswa/{{ $datasiswa->id }}">Lihat detail <i class="bi bi-chevron-right"></i></a></h5>
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
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection