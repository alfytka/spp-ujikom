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
</div><!-- End Page Title -->

<section class="section dashboard mb-5">

  @can('petugas')
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-9">

        <div class="row">

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card white-card info-card sales-card">

              <div class="filter">
                <a class="icon" href="/datakelas"><i class="bi bi-chevron-right"></i></a>
              </div>

              <div class="card-body">

                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $countKelas }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Kelas</span> <br>
                    <p>Jumlah data kelas</p>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Kelas Card -->

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card green-card info-card revenue2-card">

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
          </div><!-- End Data Kelas Card -->


          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card white-card info-card sales-card">

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
          </div><!-- End Data Kelas Card -->

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card green-card info-card revenue2-card">

              <div class="filter">
                <a class="icon" href="/datapetugas"><i class="bi bi-chevron-right"></i></a>
              </div>

              <div class="card-body">

                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $countPetugas }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Petugas</span> <br>
                    <p>Jumlah data petugas</p>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Kelas Card -->

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card green-card info-card revenue2-card">

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
          </div><!-- End Data Kelas Card -->

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card white-card info-card revenue3-card">

              <div class="filter">
                <a class="icon" href="/datapembayaran"><i class="bi bi-chevron-right"></i></a>
              </div>

              <div class="card-body">

                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $countPembayaran }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Pembayaran</span> <br>
                    <p>Data pembayaran SPP</p>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Kelas Card -->

        </div>
      </div><!-- End Left side columns -->

      </div><!-- End Right side columns --> 
    </div>
  @endcan

  @can('admin')
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-9">

        <div class="row">

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card white-card info-card sales-card">

              <div class="filter">
                <a class="icon" href="/datakelas"><i class="bi bi-chevron-right"></i></a>
              </div>

              <div class="card-body">

                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $countKelas }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Kelas</span> <br>
                    <p>Jumlah data kelas</p>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Kelas Card -->

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card green-card info-card revenue2-card">

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
          </div><!-- End Data Kelas Card -->


          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card white-card info-card sales-card">

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
          </div><!-- End Data Kelas Card -->

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card green-card info-card revenue2-card">

              <div class="filter">
                <a class="icon" href="/datapetugas"><i class="bi bi-chevron-right"></i></a>
              </div>

              <div class="card-body">

                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $countPetugas }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Petugas</span> <br>
                    <p>Jumlah data petugas</p>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Kelas Card -->

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card white-card info-card sales-card">

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
          </div><!-- End Data Kelas Card -->

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card green-card info-card revenue2-card">

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
          </div><!-- End Data Kelas Card -->

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card white-card info-card revenue3-card">

              <div class="filter">
                <a class="icon" href="/datapembayaran"><i class="bi bi-chevron-right"></i></a>
              </div>

              <div class="card-body">

                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>{{ $countPembayaran }}</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data Pembayaran</span> <br>
                    <p>Data pembayaran SPP</p>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Kelas Card -->

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-right col-md-4 col-6">
            <div class="card green-card info-card revenue2-card">

              <div class="filter">
                <a class="icon" href="#"><i class="bi bi-chevron-right"></i></a>
              </div>

              <div class="card-body">

                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>0</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data .....</span> <br>
                    <p>Jumlah data .....</p>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Kelas Card -->

          <!-- Data Kelas Card -->
          <div class="col-xxl-4 card-sm-left col-md-4 col-6">
            <div class="card white-card info-card revenue3-card">

              <div class="filter">
                <a class="icon" href="#"><i class="bi bi-chevron-right"></i></a>
              </div>

              <div class="card-body">

                <div class="align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span>0</span>
                  </div>
                  <div class="fiturname">
                    <span class="fitur-name">Data ......</span> <br>
                    <p>Jumlah data .......</p>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Kelas Card -->        

        </div>
      </div><!-- End Left side columns -->

      
      {{-- <div class="col-lg-4">
        <div class="row">


        </div>

      </div><!-- End Right side columns --> --}}
    </div>
  @endcan
</section>
@endsection