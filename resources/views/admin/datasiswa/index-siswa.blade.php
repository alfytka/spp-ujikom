@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Data Siswa</title>
@endsection
@section('content')
  
<div class="pagetitle mb-0">
  <h5 class="fw-semibold">Data Siswa</h5>
</div>

<section class="section dashboard">
  <div class="row">

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
                <a href="{{ route('datasiswa.create') }}" type="submit" class="btnn btn-ol-violet roundeds py-2 px-3 mt-1"><i class="bi bi-plus-circle pe-1"></i> <span class="d-none d-md-inline d-lg-inline">Data</span> Siswa</a>
              @endif
            </div>
          </div>

          <div class="border-dash-zinc"></div>

          <div class="table-responsive mt-2 mt-md-2 mt-lg-2">
            <table class="table table-sm" id="table1">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">NISN</th>
                  <th scope="col">Nama <span class="d-none d-md-inline d-lg-inline">Siswa</span></th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Email</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="align-middle">
                @foreach ($datasiswa as $siswa)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $siswa->nisn }}</td>
                  <td style="min-width: 200px;">{{ $siswa->name }}</td>
                  <td style="min-width: 100px;">{{ $siswa->kelas->kelas }}</td>
                  <td>{{ $siswa->email }}</td>
                  <td class="align-middle">
                    <div class="dropdown">
                      <button type="button" class="btnxs btn-white" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                      <ul class="dropdown-menu">
                        @if (auth()->user()->level == 'admin')
                          <li><a href="/datasiswa/{{ $siswa->id }}/edit" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                        @endif
                        <li><a href="/datasiswa/{{ $siswa->id }}" class="dropdown-item">Detail <i class="bi bi-text-wrap float-end"></i></a></li>
                        @if (auth()->user()->level == 'admin')
                        <div class="border-bottom mx-2"></div>
                          <li>
                            <a href="" data-bs-toggle="modal" data-bs-target="#datasiswa{{ $siswa->id }}" class="dropdown-item text-danger">Hapus <i class="bi bi-trash3 float-end"></i></a>
                          </li>
                        @endif
                      </ul>
                    </div>
                  </td>

                  <div class="modal modal-sm fade py-5" id="datasiswa{{ $siswa->id }}" tabindex="-1" data-bs-backdrop="false">
                    <div class="modal-dialog">
                      <div class="modal-content rounded-4 shadow">
                        <div class="modal-header border-bottom-0">
                          <h1 class="modal-title fs-6">Konfirmasi</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-0 mb-1 fs-12">
                          Hapus data siswa?<br>
                          <span class="text-violet fw-semibold fst-italic"> <i class="bi bi-arrow-return-right"></i> {{ $siswa->name }} - {{ $siswa->kelas->kelas }}</span>
                        </div>
                        <div class="modal-footer flex-column border-top-0">
                          <form action="/datasiswa/{{ $siswa->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-9 w-100 mx-0 mb-2 roundedx">Ya, hapus</button>
                          </form>
                          <button type="button" class="btn-y w-100 mx-0" data-bs-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
@section('my-js')
  <script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/vendor/extensions/simple-datatables.js"></script>
@endsection