@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Data Pembayaran</title>
@endsection
@section('content')
  
<div class="pagetitle mb-0">
  <h5 class="fw-semibold">Data Pembayaran</h5> 
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
          <div class="row">
            <div class="col-12 col-md-4 col-lg-4 my-auto">
              <a href="/entri-pembayaran" type="submit" class="btnn btn-ol-violet roundeds py-2 px-3 mt-3"><i class="bi bi-chevron-left d-inline d-md-none d-lg-none"></i> Entri <span class="d-none d-md-inline d-lg-inline">Pembayaran</span></a>
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
                <table class="table table-sm" id="table2">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Petugas</th>
                      <th scope="col"><span class="d-none d-md-inline d-lg-inline">Nama</span> Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Tanggal <span class="d-none d-md-inline">Bayar</span></th>
                      <th scope="col">Status</th>
                      <th scope="col">Nominal</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($pembayaranpetugas as $pembayaran)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td style="max-width: 150px;">
                      {{ $pembayaran->petugas_id == '' ? '-' : $pembayaran->userPetugas->name }}
                    </td>
                    <td style="min-width: 200px;" class="{{ $pembayaran->status == 'gagal' ? 'text-danger' : '' }}{{ $pembayaran->jenis_pembayaran == 'siswa' ? 'text-violet' : '' }}">{{ $pembayaran->userSiswa->name }}
                    </td>
                    <td style="min-width: 95px;">{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                    <td style="min-width: 110px">{{ $pembayaran->tgl_bayar }}</td>
                    <td>
                      @if ($pembayaran->status == 'diproses')
                        <span class="badge btn-ol-green pt-1 roundedx"><i class="bi bi-shuffle text-success"></i> {{ $pembayaran->status }}</span>
                      @elseif($pembayaran->status == 'sukses')
                        <span class="badge btn-ol-violet pt-1 roundedx"><i class="bi bi-check-circle-fill text-violet"></i> {{ $pembayaran->status }}</span>
                      @elseif($pembayaran->status == 'gagal')
                        <span class="badge btn-ol-red pt-1 roundedx"><i class="bi bi-exclamation-circle-fill text-danger"></i> {{ $pembayaran->status }}</span>
                      @endif
                    </td>
                    <td>Rp{{ number_format($pembayaran->userSiswa->spp->nominal, 0, '.', '.') }}</td>
                    <td class="align-middle">
                      <div class="dropdown">
                        <button type="button" class="btnxs btn-white" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                        <ul class="dropdown-menu">
                          @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                            @if ($pembayaran->status == 'diproses')
                              <li><a href="/datapembayaran/{{ $pembayaran->id }}/proses" class="dropdown-item">Proses <i class="bi bi-shuffle float-end"></i></a></li>
                            @else
                              <li><a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->jenis_pembayaran == 'siswa' ? 'paybysiswa' : 'edit' }}" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                            @endif
                          @endif
                          <li><a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}" class="dropdown-item">Detail <i class="bi bi-text-wrap float-end"></i></a></li>
                          @if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas')
                            <div class="border-bottom mx-2"></div>
                            <li>
                              <a href="" data-bs-toggle="modal" data-bs-target="#datapembayaran{{ $pembayaran->id }}" class="dropdown-item text-danger">Hapus <i class="bi bi-trash3 float-end"></i></a>
                            </li>
                          @endif
                        </ul>
                      </div>
                    </td>

                    <div class="modal modal-sm fade py-5" id="datapembayaran{{ $pembayaran->id }}" tabindex="-1" data-bs-backdrop="false">
                      <div class="modal-dialog">
                        <div class="modal-content rounded-4 shadow">
                          <div class="modal-header border-bottom-0">
                            <h1 class="modal-title fs-6">Konfirmasi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body py-0 mb-1 fs-12">
                            Hapus data pembayaran?<br>
                            <span class="text-violet fw-semibold fst-italic"> <i class="bi bi-arrow-return-right"></i> {{ $pembayaran->userSiswa->name }} - {{ $pembayaran->bulan_bayar }} {{ $pembayaran->tahun_bayar }}</span> <br>
                          </div>
                          <div class="modal-footer flex-column border-top-0">
                            <form action="/datapembayaran/{{ $pembayaran->id }}" method="POST">
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

            <div class="tab-pane fade" id="siswa">
              <div class="table-responsive">
                <table class="table table-sm" id="table3">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Petugas</th>
                      <th scope="col"><span class="d-none d-md-inline d-lg-inline">Nama</span> Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Tanggal Bayar</th>
                      <th scope="col">Status</th>
                      <th scope="col">Nominal</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($siswa as $pembayaran)
                  <tr class="{{ $pembayaran->status == 'gagal' ? 'text-danger' : '' }}">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td style="max-width: 150px;">
                      {{ $pembayaran->petugas_id == '' ? '-' : $pembayaran->userPetugas->name }}
                    </td>
                    <td style="min-width: 200px;">{{ $pembayaran->userSiswa->name }}</td>
                    <td style="min-width: 95px;">{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                    <td style="min-width: 110px">{{ $pembayaran->tgl_bayar }}</td>
                    <td>
                      @if ($pembayaran->status == 'diproses')
                        <span class="badge btn-ol-green pt-1 roundedx"><i class="bi bi-shuffle text-success"></i> {{ $pembayaran->status }}</span>
                      @elseif($pembayaran->status == 'sukses')
                        <span class="badge btn-ol-violet pt-1 roundedx"><i class="bi bi-check-circle-fill text-violet"></i> {{ $pembayaran->status }}</span>
                      @elseif($pembayaran->status == 'gagal')
                        <span class="badge btn-ol-red pt-1 roundedx"><i class="bi bi-exclamation-circle-fill text-danger"></i> {{ $pembayaran->status }}</span>
                      @endif
                    </td>
                    <td>Rp{{ number_format($pembayaran->userSiswa->spp->nominal, 0, '.', '.') }}</td>
                    <td class="align-middle">
                      <div class="dropdown">
                        <button type="button" class="btnxs btn-white" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                        <ul class="dropdown-menu">
                          @if (auth()->user()->level == 'admin')
                            @if ($pembayaran->status == 'diproses')
                              <li><a href="/datapembayaran/{{ $pembayaran->id }}/proses" class="dropdown-item">Proses <i class="bi bi-shuffle float-end"></i></a></li>
                            @else
                              <li><a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->jenis_pembayaran == 'siswa' ? 'paybysiswa' : 'edit' }}" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                            @endif
                          @endif
                          <li><a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}" class="dropdown-item">Detail <i class="bi bi-text-wrap float-end"></i></a></li>
                          @if (auth()->user()->level == 'admin')
                            <div class="border-bottom mx-2"></div>
                            <li>
                              <a href="" data-bs-toggle="modal" data-bs-target="#pembayaranbysiswa{{ $pembayaran->id }}" class="dropdown-item text-danger">Hapus <i class="bi bi-trash3 float-end"></i></a>
                            </li>
                          @endif
                        </ul>
                      </div>
                    </td>

                    <div class="modal modal-sm fade py-5" id="pembayaranbysiswa{{ $pembayaran->id }}" tabindex="-1" data-bs-backdrop="false">
                      <div class="modal-dialog">
                        <div class="modal-content rounded-4 shadow">
                          <div class="modal-header border-bottom-0">
                            <h1 class="modal-title fs-6">Konfirmasi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body py-0 mb-1 fs-12">
                            Hapus data pembayaran?<br>
                            <span class="text-violet fw-semibold fst-italic"> <i class="bi bi-arrow-return-right"></i> {{ $pembayaran->userSiswa->name }} - {{ $pembayaran->bulan_bayar }} {{ $pembayaran->tahun_bayar }}</span> <br>
                          </div>
                          <div class="modal-footer flex-column border-top-0">
                            <form action="/datapembayaran/{{ $pembayaran->id }}" method="POST">
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

            <div class="tab-pane fade" id="semua">
              <div class="table-responsive">
                <table class="table table-sm" id="table1">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Petugas</th>
                      <th scope="col"><span class="d-none d-md-inline d-lg-inline">Nama</span> Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Tanggal Bayar</th>
                      <th scope="col">Status</th>
                      <th scope="col">Nominal</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($semuapembayaran as $pembayaran)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td style="max-width: 150px;">
                      {{ $pembayaran->petugas_id == '' ? '-' : $pembayaran->userPetugas->name }}
                    </td>
                    <td style="min-width: 200px;" class="{{ $pembayaran->status == 'gagal' ? 'text-danger' : '' }}{{ $pembayaran->jenis_pembayaran == 'siswa' ? 'text-violet' : '' }}">{{ $pembayaran->userSiswa->name }}</td>
                    <td style="min-width: 95px;">{{ $pembayaran->userSiswa->kelas->kelas }}</td>
                    <td style="min-width: 110px">{{ $pembayaran->tgl_bayar }}</td>
                    <td>
                      @if ($pembayaran->status == 'diproses')
                        <span class="badge btn-ol-green pt-1 roundedx"><i class="bi bi-shuffle text-success"></i> {{ $pembayaran->status }}</span>
                      @elseif($pembayaran->status == 'sukses')
                        <span class="badge btn-ol-violet pt-1 roundedx"><i class="bi bi-check-circle-fill text-violet"></i> {{ $pembayaran->status }}</span>
                      @elseif($pembayaran->status == 'gagal')
                        <span class="badge btn-ol-red pt-1 roundedx"><i class="bi bi-exclamation-circle-fill text-danger"></i> {{ $pembayaran->status }}</span>
                      @endif
                    </td>
                    <td>Rp{{ number_format($pembayaran->userSiswa->spp->nominal, 0, '.', '.') }}</td>
                    <td class="align-middle">
                      <div class="dropdown">
                        <button type="button" class="btnxs btn-white" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                        <ul class="dropdown-menu">
                          @if (auth()->user()->level == 'admin')
                            @if ($pembayaran->status == 'diproses')
                              <li><a href="/datapembayaran/{{ $pembayaran->id }}/proses" class="dropdown-item">Proses <i class="bi bi-shuffle float-end"></i></a></li>
                            @else
                              <li><a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->jenis_pembayaran == 'siswa' ? 'paybysiswa' : 'edit' }}" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                            @endif
                          @endif
                          <li><a href="/datapembayaran/{{ $pembayaran->id }}/{{ $pembayaran->userSiswa->id }}" class="dropdown-item">Detail <i class="bi bi-text-wrap float-end"></i></a></li>
                          @if (auth()->user()->level == 'admin')
                            <div class="border-bottom mx-2"></div>
                            <li>
                              <a href="" data-bs-toggle="modal" data-bs-target="#semua{{ $pembayaran->id }}" class="dropdown-item text-danger">Hapus <i class="bi bi-trash3 float-end"></i></a>
                            </li>
                          @endif
                        </ul>
                      </div>
                    </td>

                    <div class="modal modal-sm fade py-5" id="semua{{ $pembayaran->id }}" tabindex="-1" data-bs-backdrop="false">
                      <div class="modal-dialog">
                        <div class="modal-content rounded-4 shadow">
                          <div class="modal-header border-bottom-0">
                            <h1 class="modal-title fs-6">Konfirmasi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body py-0 mb-1 fs-12">
                            Hapus data pembayaran?<br>
                            <span class="text-violet fw-semibold fst-italic"> <i class="bi bi-arrow-return-right"></i> {{ $pembayaran->userSiswa->name }} - {{ $pembayaran->bulan_bayar }} {{ $pembayaran->tahun_bayar }}</span> <br>
                          </div>
                          <div class="modal-footer flex-column border-top-0">
                            <form action="/datapembayaran/{{ $pembayaran->id }}" method="POST">
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
    </div>
  </div>
</section>
@endsection

@section('my-js')
  <script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/vendor/extensions/simple-datatables.js"></script>
  <script src="/vendor/extensions/table3.js"></script>
  <script src="/vendor/extensions/table2.js"></script>
@endsection