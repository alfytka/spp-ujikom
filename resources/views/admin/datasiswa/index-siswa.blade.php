@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Data Siswa</title>
@endsection
@section('content')
  
<div class="pagetitle mb-0">
  <h5 class="fw-semibold">Data Siswa</h5>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">

      @if (session()->has('informasi'))
      <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
        <span><b>Berhasil - </b>{{ session('informasi') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif 

        <div class="cardxy shadow-sm">
            <div class="card-body">
                <div class="row px-1 my-2">
                  <div class="col-6 my-auto">
                    <h6 class="card-title">Daftar Siswa</h6>
                  </div>
                  <div class="col-6 my-auto text-end">
                    @if (auth()->user()->level == 'admin')
                      <a href="{{ route('datasiswa.create') }}" type="submit" class="btnn btn-ol-violet roundeds py-2 px-3 mt-1"><i class="bi bi-plus-lg pe-1"></i> <span class="d-none d-md-inline d-lg-inline">Data</span> Siswa</a>
                    @endif
                  </div>
                </div>

                <div class="border-dash-zinc"></div>

              <div class="table-responsive mt-2 mt-md-2 mt-lg-2">
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
                            @if (auth()->user()->level == 'admin')
                              <li><a href="/datasiswa/{{ $siswa->id }}/edit" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                            @endif
                            <li><a href="/datasiswa/{{ $siswa->id }}" class="dropdown-item">Detail <i class="bi bi-eye float-end"></i></a></li>
                            @if (auth()->user()->level == 'admin')
                              <li>
                                <form action="/datasiswa/{{ $siswa->id }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button onclick="return confirm('Hapus data siswa?')" class="dropdown-item">Hapus <i class="bi bi-x-lg float-end"></i></button>
                                </form>
                              </li>
                            @endif
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

</section>

@endsection

@section('my-js')
  <script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/vendor/extensions/simple-datatables.js"></script>
@endsection