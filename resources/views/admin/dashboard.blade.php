@extends('layouts.kerangka')
@section('titles')<title>SPP - Dashboard</title>@endsection
@section('content')

<div class="row">
  <div class="col-lg-8">
    @if (session()->has('success'))
    <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
      <i class="bi bi-info-circle-fill ms-1 py-0 my-0 me-2"></i>
      <span class="fw-bold fst-italic">{{ session('success') }} {{ auth()->user()->username }}.</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  </div>
</div>

<div class="pagetitle">
  <h5 class="fw-semibold">Dashboard</h5>
</div>

<section class="section dashboard mb-5">

  @can('petugas')
    <div class="row">
      <div class="col-lg-9">

        <div class="row">

          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card blue-card info-card sales-card" style="border: 1px dashed #93c5fd;">
              <div class="filter">
                <a class="icon" href="/datakelas"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #dbeafe;">
                    <span>{{ $pembayaranSuccess }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Pembayaran</span> <br>
                    <p>Data pembayaran: <span class="fw-bold">sukses</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card green-card info-card revenue2-card" style="border: 1px dashed #86efac;">
              <div class="filter">
                <a class="icon" href="/dataadmin"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $pembayaranDiproses }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Pembayaran <i class="bi bi-shuffle text-success"></i></span> <br>
                    <p>Status pembayaran: <span class="fw-bold">diproses</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card white-card info-card sales-card" style="border: 1px dashed #d4d4d4;">
              <div class="filter">
                <a class="icon" href="/dataspp"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $countSiswa }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Siswa</span> <br>
                    <p>Jumlah data siswa</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card blue-card info-card sales-card" style="border: 1px dashed #93c5fd;">
              <div class="filter">
                <a class="icon" href="/datakelas"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #dbeafe;">
                    <span>{{ $petugas }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Pembayaran</span> <br>
                    <p>Pembayaran yang ditangani oleh Anda </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card green-card info-card revenue2-card" style="border: 1px dashed #86efac;">
              <div class="filter">
                <a class="icon" href="/dataadmin"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span><i class="fs-5">Rp</i></span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Entri Pembayaran</span> <br>
                    <p>Transaksi pembayaran siswa</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card white-card info-card sales-card" style="border: 1px dashed #d4d4d4;">
              <div class="filter">
                <a class="icon" href="/dataspp"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span><i class="bi bi-clipboard-check"></i></span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Laporan</span> <br>
                    <p>Print laporan pembayaran</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        </div>

      </div>
    </div>
  @endcan

  @can('admin')
    <div class="row">
      <div class="col-lg-9">

        <div class="row">
          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card blue-card info-card sales-card" style="border: 1px dashed #93c5fd;">
              <div class="filter">
                <a class="icon" href="/datakelas"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #dbeafe;">
                    <span>{{ $countKelas }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Kelas</span> <br>
                    <p>Jumlah data kelas</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card green-card info-card revenue2-card" style="border: 1px dashed #86efac;">
              <div class="filter">
                <a class="icon" href="/dataprodi"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $countProdi }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Prodi</span> <br>
                    <p>Jumlah data prodi</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card white-card info-card sales-card" style="border: 1px dashed #d4d4d4;">
              <div class="filter">
                <a class="icon" href="/datasiswa"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $countSiswa }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Siswa</span> <br>
                    <p>Jumlah data siswa</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card blue-card info-card sales-card" style="border: 1px dashed #93c5fd;">
              <div class="filter">
                <a class="icon" href="/datapetugas"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #dbeafe;">
                    <span>{{ $countPetugas }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Petugas</span> <br>
                    <p>Jumlah data petugas</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card green-card info-card revenue2-card" style="border: 1px dashed #86efac;">
              <div class="filter">
                <a class="icon" href="/dataadmin"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $countAdmin }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Admin</span> <br>
                    <p>Jumlah data admin</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card white-card info-card sales-card" style="border: 1px dashed #d4d4d4;">
              <div class="filter">
                <a class="icon" href="/dataspp"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $countSpp }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data SPP</span> <br>
                    <p>Jumlah data SPP</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card blue-card info-card sales-card" style="border: 1px dashed #93c5fd;">
              <div class="filter">
                <a class="icon" href="/datapembayaran"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #dbeafe;">
                    <span>{{ $countPembayaran }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Pembayaran</span> <br>
                    <p>Data pembayaran SPP</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card green-card info-card revenue2-card" style="border: 1px dashed #86efac;">
              <div class="filter">
                <a class="icon" href="/entri-pembayaran"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span><i class="fs-5">Rp</i></span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Entri Pembayaran</span> <br>
                    <p>Transaksi pembayaran siswa</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card white-card info-card sales-card" style="border: 1px dashed #d4d4d4;">
              <div class="filter">
                <a class="icon" href="/laporan"><i class="bi bi-chevron-right"></i></a>
              </div>
              <div class="card-body">
                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span><i class="bi bi-clipboard-check"></i></span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Laporan</span> <br>
                    <p>Print laporan pembayaran</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="pagetitle mt-3">
      <h5 class="fw-semibold">Log Activities</h5>
    </div>

    <div class="row">
      <div class="col-xxl-4 card-sm-right col-md-9 col-12">
        <div class="cardxy green-card info-card revenue2-card" style="border: 1px dashed #86efac;">
          
          <div class="card-body">
            <div class="table-responsive mt-4 mt-md-3 mt-lg-3">
              <table class="table table-sm table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col"><i class="bi bi-clock text-success"></i></th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($logactivities as $log)
                <tr>
                  <td>{{ $log->pembayaranPetugas->userPetugas->name }}</td>
                  <td>{{ $log->keterangan }} <u>{{ $log->pembayaranPetugas->userSiswa->name }}</u></td>
                  <td>{{ $log->created_at }}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  @endcan
</section>
@endsection