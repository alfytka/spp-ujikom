@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Data Pembayaran</title>
@endsection
@section('content')
  
<div class="pagetitle mb-0">
  <h5 class="fw-semibold">Data Pembayaran</h5> 
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
                <div class="row">
                  <div class="col-12 col-md-4 col-lg-4 my-auto">
                    <a href="{{ route('datapembayaran.create') }}" type="submit" class="btnn btn-ol-violet roundeds py-2 px-3 mt-3"><i class="bi bi-plus-lg d-inline d-md-none d-lg-none"></i> Entri <span class="d-none d-md-inline d-lg-inline">Pembayaran</span></a>
                  </div>
                  <div class="col-12 col-md-8 col-lg-8">
                    <ul class="nav nav-tabs nav-tabs-bordered mt-0 mt-md-3 mt-lg-3 float-center float-md-start fs-10">

                      <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#transaksi_saya">Petugas</button>
                      </li>
      
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#siswa">Siswa</button>
                      </li>

                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#semua">Semua</button>
                      </li>
      
                    </ul>
                  </div>
                  <div class="col-12 mt-2 mb-1 mx-auto border-bottom"></div>
                </div>


              <div class="tab-content">

                <div class="tab-pane fade show active" id="transaksi_saya">
                  <div class="table-responsive">
                    <!-- Default Table -->
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col"><span class="d-none d-md-inline d-lg-inline">Nama</span> Petugas</th>
                          <th scope="col"><span class="d-none d-md-inline d-lg-inline">Nama</span> Siswa</th>
                          <th scope="col">Kelas</th>
                          <th scope="col">Tanggal Bayar</th>
                          <th scope="col">Status</th>
                          <th scope="col">Nominal</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody class="align-middle">
                        @foreach ($pembayaranpetugas as $pembayaran)
                        <tr class="{{ $pembayaran->status == 'gagal' ? 'text-danger' : '' }}{{ $pembayaran->jenis_pembayaran == 'siswa' ? 'text-violet' : '' }}">
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>
                            {{ $pembayaran->petugas_id == '' ? '-' : $pembayaran->userPetugas->name }}
                          </td>
                          <td>{{ $pembayaran->userSiswa->name }}</td>
                          <td>{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                          <td>{{ $pembayaran->tgl_bayar }}</td>
                          <td>
                            @if ($pembayaran->status == 'diproses')
                              <span class="badge btn-ol-green pt-1 roundedx"><i class="bi bi-shuffle text-success"></i> {{ $pembayaran->status }}</span>
                            @elseif($pembayaran->status == 'sukses')
                              <span class="badge btn-ol-violet pt-1 roundedx"><i class="bi bi-check-circle-fill text-violet"></i> {{ $pembayaran->status }}</span>
                            @elseif($pembayaran->status == 'gagal')
                              <span class="badge btn-ol-red pt-1 roundedx"><i class="bi bi-exclamation-circle-fill text-danger"></i> {{ $pembayaran->status }}</span>
                            @endif
                          </td>
                          {{-- <td>{{ $pembayaran->userSiswa->spp->tahun }}</td> --}}
                          <td>Rp{{ number_format($pembayaran->userSiswa->spp->nominal, 0, '.', '.') }}</td>
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btnxs btn-view" data-bs-toggle="dropdown"><i class="bi bi-view-list"></i></button>
                              <ul class="dropdown-menu">
                                <li><a href="/datapembayaran/{{ $pembayaran->id }}/edit" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                                <li><a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}" class="dropdown-item">Detail <i class="bi bi-eye float-end"></i></a></li>
                                <li>
                                  <form action="/datapembayaran/{{ $pembayaran->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus data pembayaran?')" class="dropdown-item">Hapus <i class="bi bi-x-lg float-end"></i></button>
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

                <div class="tab-pane fade" id="siswa">
                  <div class="table-responsive">
                    <!-- Default Table -->
                    <table class="table table-sm" id="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col"><span class="d-none d-md-inline d-lg-inline">Nama</span> Petugas</th>
                          <th scope="col"><span class="d-none d-md-inline d-lg-inline">Nama</span> Siswa</th>
                          <th scope="col">Kelas</th>
                          <th scope="col">Tanggal Bayar</th>
                          <th scope="col">Status</th>
                          {{-- <th scope="col">Tahun <i class="fs-12">Spp</i></th> --}}
                          <th scope="col">Nominal</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody class="align-middle">
                        @foreach ($siswa as $pembayaran)
                        <tr 
                        @if ($pembayaran->status == 'gagal')
                          class="text-danger"
                        @endif>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>
                            {{ $pembayaran->petugas_id == '' ? '-' : $pembayaran->userPetugas->name }}
                          </td>
                          <td>{{ $pembayaran->userSiswa->name }}</td>
                          <td>{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                          <td>{{ $pembayaran->tgl_bayar }}</td>
                          <td>
                            @if ($pembayaran->status == 'diproses')
                              <span class="badge btn-ol-green pt-1 roundedx"><i class="bi bi-shuffle text-success"></i> {{ $pembayaran->status }}</span>
                            @elseif($pembayaran->status == 'sukses')
                              <span class="badge btn-ol-violet pt-1 roundedx"><i class="bi bi-check-circle-fill text-violet"></i> {{ $pembayaran->status }}</span>
                            @elseif($pembayaran->status == 'gagal')
                              <span class="badge btn-ol-red pt-1 roundedx"><i class="bi bi-exclamation-circle-fill text-danger"></i> {{ $pembayaran->status }}</span>
                            @endif
                          </td>
                          {{-- <td>{{ $pembayaran->userSiswa->spp->tahun }}</td> --}}
                          <td>Rp{{ number_format($pembayaran->userSiswa->spp->nominal, 0, '.', '.') }}</td>
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btnxs btn-view" data-bs-toggle="dropdown"><i class="bi bi-view-list"></i></button>
                              <ul class="dropdown-menu">
                                @if (auth()->user()->level == 'admin')
                                  @if ($pembayaran->status == 'diproses')
                                    <li><a href="/datapembayaran/{{ $pembayaran->id }}/proses" class="dropdown-item">Proses <i class="bi bi-shuffle float-end"></i></a></li>
                                  @else
                                    <li><a href="/datapembayaran/{{ $pembayaran->id }}/edit" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                                  @endif
                                @endif
                                <li><a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}" class="dropdown-item">Detail <i class="bi bi-eye float-end"></i></a></li>
                                @if (auth()->user()->level == 'admin')
                                  <li>
                                    <form action="/datapembayaran/{{ $pembayaran->id }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button onclick="return confirm('Hapus data pembayaran?')" class="dropdown-item">Hapus <i class="bi bi-x-lg float-end"></i></button>
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

                <div class="tab-pane fade" id="semua">
                  <div class="table-responsive">
                    <!-- Default Table -->
                    <table class="table table-sm" id="table1">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col"><span class="d-none d-md-inline d-lg-inline">Nama</span> Petugas</th>
                          <th scope="col"><span class="d-none d-md-inline d-lg-inline">Nama</span> Siswa</th>
                          <th scope="col">Kelas</th>
                          <th scope="col">Tanggal Bayar</th>
                          <th scope="col">Status</th>
                          {{-- <th scope="col">Tahun <i class="fs-12">Spp</i></th> --}}
                          <th scope="col">Nominal</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody class="align-middle">
                        @foreach ($semuapembayaran as $pembayaran)
                        <tr class="{{ $pembayaran->status == 'gagal' ? 'text-danger' : '' }}{{ $pembayaran->jenis_pembayaran == 'siswa' ? 'text-violet' : '' }}">
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>
                            {{ $pembayaran->petugas_id == '' ? '-' : $pembayaran->userPetugas->name }}
                          </td>
                          <td>{{ $pembayaran->userSiswa->name }}</td>
                          <td>{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                          <td>{{ $pembayaran->tgl_bayar }}</td>
                          <td>
                            @if ($pembayaran->status == 'diproses')
                              <span class="badge btn-ol-green pt-1 roundedx"><i class="bi bi-shuffle text-success"></i> {{ $pembayaran->status }}</span>
                            @elseif($pembayaran->status == 'sukses')
                              <span class="badge btn-ol-violet pt-1 roundedx"><i class="bi bi-check-circle-fill text-violet"></i> {{ $pembayaran->status }}</span>
                            @elseif($pembayaran->status == 'gagal')
                              <span class="badge btn-ol-red pt-1 roundedx"><i class="bi bi-exclamation-circle-fill text-danger"></i> {{ $pembayaran->status }}</span>
                            @endif
                          </td>
                          {{-- <td>{{ $pembayaran->userSiswa->spp->tahun }}</td> --}}
                          <td>Rp{{ number_format($pembayaran->userSiswa->spp->nominal, 0, '.', '.') }}</td>
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btnxs btn-view" data-bs-toggle="dropdown"><i class="bi bi-view-list"></i></button>
                              <ul class="dropdown-menu">
                                @if (auth()->user()->level == 'admin')
                                  @if ($pembayaran->status == 'diproses')
                                    <li><a href="/datapembayaran/{{ $pembayaran->id }}/proses" class="dropdown-item">Proses <i class="bi bi-shuffle float-end"></i></a></li>
                                  @else
                                    <li><a href="/datapembayaran/{{ $pembayaran->id }}/edit" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                                  @endif
                                @endif
                                <li><a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}" class="dropdown-item">Detail <i class="bi bi-eye float-end"></i></a></li>
                                @if (auth()->user()->level == 'admin')
                                  <li>
                                    <form action="/datapembayaran/{{ $pembayaran->id }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button onclick="return confirm('Hapus data pembayaran?')" class="dropdown-item">Hapus <i class="bi bi-x-lg float-end"></i></button>
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