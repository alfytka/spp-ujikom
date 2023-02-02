@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold">Data Siswa</h5>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-10">

        <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
          <span><b>Berhasil. </b></span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="cardxy shadow-sm">
            <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8">
                    <h6 class="card-title">Data Siswa</h6>
                  </div>
                  <div class="col-12 col-md-4 col-lg-4 my-auto">
                    <form action="{{ url()->current() }}" method="GET">
                      <div class="input-group">
                        <input type="text" name="search" value="{{ request('search') }}" class="mt-1 mb-3 mb-lg-0 mt-lg-3 mt-md-3 roundedx form-control form-control-sm" placeholder="Cari..." autocomplete="off">
                        <button class="btnxs btn-outline-navy rounded-r mt-1 mb-3 mb-lg-0 mt-lg-3 mt-md-3" type="submit"><i class="bi bi-search px-2 px-md-2 px-lg-1"></i></button>
                      </div>
                    </form>
                  </div>
                </div>

              <div class="table-responsive">
                <!-- Default Table -->
                <table class="table table-sm mt-lg-2">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">NISN</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Telepon</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    {{-- @foreach ($dataprodi as $prodi) --}}
                    <tr>
                      <th scope="row">1</th>
                      <td>3157839204</td>
                      <td>Alfitka Haerul Kurniawan</td>
                      <td>XII RPL 1</td>
                      <td>082174829103</td>
                      <td>
                        <a href="#" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="#" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="$" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>3157839204</td>
                      <td>Alfitka Haerul Kurniawan</td>
                      <td>XII RPL 1</td>
                      <td>082174829103</td>
                      <td>
                        <a href="#" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="#" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="$" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>3157839204</td>
                      <td>Alfitka Haerul Kurniawan</td>
                      <td>XII RPL 1</td>
                      <td>082174829103</td>
                      <td>
                        <a href="#" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="#" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="$" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>3157839204</td>
                      <td>Alfitka Haerul Kurniawan</td>
                      <td>XII RPL 1</td>
                      <td>082174829103</td>
                      <td>
                        <a href="#" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="#" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="$" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>3157839204</td>
                      <td>Alfitka Haerul Kurniawan</td>
                      <td>XII RPL 1</td>
                      <td>082174829103</td>
                      <td>
                        <a href="#" class="btnxs btn-view"><i class="bi bi-view-list"></i></a>
                        <a href="#" class="btnxs btn-zinc"><i class="bi bi-pen"></i></a>
                        <form action="$" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red"><i class="bi bi-x-lg"></i></button>
                          {{-- <button onclick="return confirm('Hapus data kompetensi keahlian?')" class="btnxs btn-red" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="bi bi-x-lg"></i></button> --}}
                        </form>
                      </td>
                    </tr>
                    {{-- @endforeach --}}
                  </tbody>
                </table>
                <!-- End Default Table Example -->
              </div>
            </div>
          </div>

      <!-- <div class="row">

      </div> -->
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    

  </div>

  <div class="row">
    <div class="col-lg-4">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-plus-lg"></i> Tambah Data Siswa</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/dataprodi" method="POST">
            @csrf
            <div class="col-12">
              <label for="nisn" class="form-label">NISN</label>
              <input type="text" name="nisn" class="form-control form-control-smx roundedx @error('nisn') is-invalid @enderror" value="{{ old('nisn') }}" placeholder="Masukkan nama jurusan" id="nisn" autocomplete="off">
              @error('nisn')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="nis" class="form-label">NIS</label>
              <input type="text" name="nis" class="form-control form-control-smx roundedx @error('nis') is-invalid @enderror" value="{{ old('nis') }}" placeholder="Masukkan nama jurusan" id="nis" autocomplete="off">
              @error('nis')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="name" class="form-label">Nama Siswa</label>
              <input type="text" name="name" class="form-control form-control-smx roundedx @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama jurusan" id="name" autocomplete="off">
              @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="kelas_id" class="form-label">Kelas</label>
              <select name="kelas_id" class="form-select form-select-smx roundedx @error('kelas_id') is-invalid @enderror" id="kelas_id">
                <option disabled value>- Pilih kelas -</option>
                @foreach ($datakelas as $kelas)
                  <option disabled selected hidden>- Pilih kelas -</option>
                  <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                @endforeach
              </select>
              @error('kelas_id')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="spp_id" class="form-label">Tahun SPP</label>
              <input type="text" name="spp_id" class="form-control form-control-smx roundedx @error('spp_id') is-invalid @enderror" value="{{ old('spp_id') }}" placeholder="Masukkan nama jurusan" id="spp_id" autocomplete="off">
              @error('spp_id')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="text" name="email" class="form-control form-control-smx roundedx @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukkan nama jurusan" id="email" autocomplete="off">
              @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="username" class="form-label">Userusername</label>
              <input type="text" name="username" class="form-control form-control-smx roundedx @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Masukkan nama jurusan" id="username" autocomplete="off">
              @error('username')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control form-control-smx roundedx @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Masukkan nama jurusan" id="password" autocomplete="off">
              @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="telepon" class="form-label">Telepon</label>
              <input type="text" name="telepon" class="form-control form-control-smx roundedx @error('telepon') is-invalid @enderror" value="{{ old('telepon') }}" placeholder="Masukkan nama jurusan" id="telepon" autocomplete="off">
              @error('telepon')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" name="alamat" class="form-control form-control-smx roundedx @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Masukkan nama jurusan" id="alamat" autocomplete="off">
              @error('alamat')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="level" class="form-label mb-">Level</label>
              <input type="text" name="level" class="form-control form-control-smx roundedx @error('level') is-invalid @enderror" value="{{ old('level') }}" placeholder="Singkatan: RPL" id="level" autocomplete="off">
              @error('level')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="text-end">
              <button type="submit" class="btnn btn-violet py-2 px-4 mt-1 mb-3">Simpan</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>

    </div><!-- End Right side columns -->
  </div>
</section>

@endsection
