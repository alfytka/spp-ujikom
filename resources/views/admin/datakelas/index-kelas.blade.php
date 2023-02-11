@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold">Data Kelas</h5>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">

      @if (session()->has('informasi'))
        <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
          <span><b>Berhasil - </b>{{ session('informasi') }}</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif 

        <div class="cardxy shadow-sm">
            <div class="card-body">

              <div class="table-responsive mt-4 mt-md-3 mt-lg-3">
                <!-- Default Table -->
                <table class="table table-sm" id="table1">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Kelas</th>
                      <th scope="col">Kompetensi Keahlian</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="">
                  @foreach ($datakelas as $kelas)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $kelas->kelas }}</td>
                      <td>{{ $kelas->kompetensiKeahlian->name }}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btnxs btn-view" data-bs-toggle="dropdown"><i class="bi bi-view-list"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="/datakelas/{{ $kelas->id }}" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                            <li>
                              <form action="/datakelas/{{ $kelas->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus data kelas?')" class="dropdown-item">Hapus <i class="bi bi-x-lg float-end"></i></button>
                              </form>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  @endforeach
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
    <div class="col-lg-4">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-plus-lg"></i> Tambah Data Kelas</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/datakelas" method="POST">
            @csrf
            <div class="col-12">
              <label for="namaKelas" class="form-label mb-1">Nama Kelas</label>
              <input type="text" name="kelas" class="form-control form-control-smx roundedx @error('kelas') is-invalid @enderror" placeholder="ex: XII RPL 1" id="namaKelas" autocomplete="off" value="{{ old('kelas') }}">
              @error('kelas')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="dataProdi" class="form-label mb-1">Kompetensi Keahlian</label>
              <select name="kompetensikeahlian_id" id="dataProdi" class="form-select form-select-smx roundedx @error('kompetensikeahlian_id') is-invalid @enderror">
                <option disabled value>- Pilih kompetensi keahlian -</option>
                @foreach ($dataprodi as $prodi)
                  <option disabled selected hidden>- Pilih kompetensi keahlian -</option>
                  <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                @endforeach
              </select>
              @error('kompetensikeahlian_id')
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