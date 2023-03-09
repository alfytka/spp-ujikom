@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Beranda</title>
@endsection
@section('content')

<div class="pagetitle">
  <h5 class="fw-semibold mb-0">Hello, {{ auth()->user()->username }}</h5>
  @if (session()->has('success'))
    <p class="fs-12">Selamat pagi dan selamat datang di Aplikasi Pembayaran SPP </p>
  @else
    <p class="fs-12">Aplikasi Pembayaran SPP - {{ $datasekolah->nama_sekolah }}</p>
  @endif
</div>

<section class="section dashboard mb-5">
  <div class="row">

    <div class="col-lg-12">

      <div class="row">

        <div class="col-xxl-3 card-sm-left col-md-3 col-12">
          <div class="card green-card info-card revenue2-card" style="height: 300px; border: 1px dashed #86efac;">

            <div class="card-body">

              <div class="align-items-center">

                <div class="count text-center mt-4">
                  <i class="bi bi-chevron-down"></i>
                  <h3 class="pb-0 mb-0">{{ $pembayaransiswa }}<small>x</small></h3>
                  <i class="bi bi-chevron-up"></i>
                </div>
                <div class="border-bottom mt-2"></div>
                <div class="card-icon rounded-circle d-flex mt-3 align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="fiturname">
                  <span class="fitur-name">Pembayaran</span> <br>
                  <p>Ingin lihat transaksi yang baru saja kamu lakukan?</p>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-xxl-3 card-sm-left col-md-3 col-12">
          <div class="card border-only-card info-card sales-card" style="height: 300px;">

            <div class="card-body">

              <div class="align-items-center">

                <div class="count text-center mt-4">
                  <i class="bi bi-chevron-down"></i>
                  <h4 class="pb-0 mb-0"><small>Rp</small>{{ number_format($datasiswa->spp->nominal, 0, '.', '.') }}<small class="fs-10 fw-normal">/bulan</small></h4>
                  <i class="bi bi-chevron-up"></i>
                </div>
                <div class="border-bottom mt-2"></div>
                <div class="card-icon rounded-circle d-flex mt-3 align-items-center justify-content-center">
                  <i class="fs-6 ">Rp</i>
                </div>
                <div class="fiturname">
                  <span class="fitur-name">Nominal <i>spp</i></span> <br>
                  <p>Nominal berdasarkan tahun spp yang harus dibayarkan tiap bulannya.</p>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-xxl-5 card-sm-left col-md-5 col-12">
          <div class="cardxy border-only-card h-me info-card">

            <div class="card-body">

              <div class="align-items-center">

                <div class="fiturname mt-2 pt-1">
                  <span class="fitur-name text-violet">Bulan Pembayaran <i class="fs-6">spp</i></span>
                </div>
                <div class="fiturname mb-1">
                  <p>List pembayaran spp (bulan, tahun bayar)</p>
                </div>
                <div class="border-dash-zinc mb-2"></div>
                <div class="col-12 col-md-12 col-lg-12 detail-form table-res-me table-responsive">
                  <table class="table table-sm table-borderless">
                    @foreach ($berandasiswa as $siswa)
                    <tr>
                      <td>
                        <a href="#">
                          <i class="bi bi-arrow-right"></i>
                        </a>
                      </td>
                      <td>
                        <a href="#">
                          <span class="badge btn-violet">{{ $siswa->bulan_bayar }} - {{ $siswa->tahun_bayar }}</span>
                        </a>
                      </td>
                      <td>
                        <a href="#" class="text-violet">
                          <span class="fs-10"><span class="d-none d-md-inline">Nominal - </span>{{ number_format($siswa->jumlah_bayar, 0, '.', '.') }}</span>
                        </a>
                      </td>
                      <td>
                        <a href="#">
                          <i class="bi bi-check2 fs-5"></i>
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
        
        {{-- <div class="col-xxl-4 card-sm-left col-md-4 col-12">
          <div class="card white-card info-card sales-card" style="height: 300px;">

            <div class="card-body">

              <div class="align-items-center">

                <div class="d-flex" style="font-family: Quicksand;">
                  <div class="card-icon rounded-circle d-flex mt-4 align-items-center justify-content-center">
                    <i class="pe-1 pb-1">Q</i>
                  </div>
                  <div class="mt-4 ms-2 pt-2">
                    <span class="fitur-name fst-italic">Question</span>
                  </div>

                </div>
                <div class="fiturname">
                  <span class="fitur-name">#iniinfo</span> <br>
                  <p>berapa sih nominal spp yang harus dibayarkan tiap bulannya sesuai dengan tahun spp siswa (saya)?</p>
                </div>
                <div class="fiturname text-center mt-5">
                  <p>scroll down</p>
                  <i class="bi bi-chevron-down"></i>
                </div>
              </div>
            </div>

          </div>
        </div> --}}

        <div class="col-xxl-4 card-sm-left col-md-4 col-12">
          <div class="card white-card info-card sales-card" style="height: 300px;">

            <div class="card-body">

              <div class="align-items-center">

                <div class="d-flex">
                  <div class="card-icon rounded-circle d-flex mt-4 align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="mt-4 ms-2 pt-2">
                    <span class="fitur-name fst-italic">My Data</span>
                  </div>

                </div>
                <div class="fiturname">
                  <span class="fitur-name">Profil Siswa</span> <br>
                  <p>Cek kembali data profil kamu, bisa dengan kunjungi laman profil siswa atau klik pranala (tautan) dibawah ini.</p>
                </div>
                <div class="fiturname text-end mt-5">
                  <a href="{{ route('profile-siswa.index') }}">
                    <p>cek profil</p>
                    <i class="bi bi-arrow-return-right"></i>
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>   
    </div>
  </div>
</section>
@endsection