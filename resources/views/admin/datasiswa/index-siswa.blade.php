@extends('layouts.admin.kerangka')

@section('content')
  
<div class="pagetitle mb-0">
  <div class="row">
    <div class="col-6 d-none d-md-inline d-lg-inline">
      <h5 class="fw-semibold">Data Siswa</h5>
    </div>
    <div class="col-6 col-md-6 col-lg-5 text-start text-md-end">
      <a href="{{ route('datasiswa.create') }}" type="submit" class="btnn btn-ol-violet roundeds relative-me py-2 px-3 "><i class="bi bi-plus-lg pe-1"></i> Data Siswa</a>
    </div>
  </div>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-11">

      @if (session()->has('informasi'))
      <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
        <span><b>Berhasil - </b>{{ session('informasi') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif 

        <div class="cardxy shadow-sm">
            <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8 my-auto d-inline d-md-none d-lg-none">
                    <h6 class="card-title">Data Siswa</h6>
                  </div>
                </div>

              <div class="table-responsive mt-1 mt-md-3 mt-lg-3">
                <!-- Default Table -->
                <table class="table table-sm" id="table1">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">NISN</th>
                      <th scope="col">Nama <span class="d-none d-md-inline d-lg-inline">Siswa</span></th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Email</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="align-middle">
                    @foreach ($datasiswa as $siswa)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $siswa->nisn }}</td>
                      <td>{{ $siswa->name }}</td>
                      <td>{{ $siswa->kelas->kelas }}</td>
                      <td>{{ $siswa->email }}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btnxs btn-view" data-bs-toggle="dropdown"><i class="bi bi-view-list"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="/datasiswa/{{ $siswa->id }}/edit" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                            <li><a href="/datasiswa/{{ $siswa->id }}" class="dropdown-item">Detail <i class="bi bi-eye float-end"></i></a></li>
                            <li>
                              <form action="/datasiswa/{{ $siswa->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus data siswa?')" class="dropdown-item">Hapus <i class="bi bi-x-lg float-end"></i></button>
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
    

  </div>

  <div class="row">
    <div class="col-lg-4">

      

    </div><!-- End Right side columns -->
  </div>
</section>

@endsection
