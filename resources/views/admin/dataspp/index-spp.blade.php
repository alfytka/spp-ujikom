@extends('layouts.kerangka')
@section('titles')
  <title>SPP - Data SPP</title>
@endsection
@section('content')
  
<div class="pagetitle">
  <h5 class="fw-semibold">Data SPP <span class="float-end d-inline d-md-none"><a href="#q"><i class="bi bi-plus-circle-dotted"></i> <span class="fs-12 fw-normal">Spp</span></a></span></h5>
</div>

<section class="section dashboard">
  <div class="row">
    <div class="col-lg-8">
      @if (session()->has('informasi'))
        <div class="alert alert-light border-zinc roundeds alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
          <span><b>Berhasil - </b>{{ session('informasi') }}</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="cardxy shadow-sm mb-4">
        <div class="card-body">
          <div class="table-responsive mt-4 mt-md-3 mt-lg-3">
            <table class="table table-sm" id="table1">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tahun SPP</th>
                  <th scope="col">Nominal Bayar</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($dataspp as $spp)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $spp->tahun }}</td>
                <td>Rp{{ number_format($spp->nominal, 0, '.', '.') }}</td>
                <td class="align-middle">
                  <div class="dropdown">
                    <button type="button" class="btnxs btn-white" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                    <ul class="dropdown-menu">
                      <li><a href="/dataspp/{{ $spp->id }}" class="dropdown-item">Edit <i class="bi bi-pen float-end"></i></a></li>
                      <div class="border-bottom mx-2"></div>
                      <li>
                        <a href="" data-bs-toggle="modal" data-bs-target="#dataspp{{ $spp->id }}" class="dropdown-item text-danger">Hapus <i class="bi bi-trash3 float-end"></i></a>
                      </li>
                    </ul>
                  </div>
                </td>

                <div class="modal modal-sm fade py-5" id="dataspp{{ $spp->id }}" tabindex="-1" data-bs-backdrop="false">
                  <div class="modal-dialog">
                    <div class="modal-content rounded-4 shadow">
                      <div class="modal-header border-bottom-0">
                        <h1 class="modal-title fs-6">Konfirmasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body py-0 mb-1 fs-12">
                        Hapus data spp?<br>
                        <span class="text-violet fw-semibold fst-italic"> <i class="bi bi-arrow-return-right"></i> Tahun <i class="fs-10">SPP</i> {{ $spp->tahun }} - Rp{{ number_format($spp->nominal, 0, '.', '.') }}</span>
                      </div>
                      <div class="modal-footer flex-column border-top-0">
                        <form action="/dataspp/{{ $spp->id }}" method="POST">
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

    <div class="col-lg-4 mb-5">
      <div class="cardxy shadow-sm" id="q">
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-plus-lg"></i> Tambah Data SPP</h5>
          <form class="row g-3" action="/dataspp" method="POST">
            @csrf
            <div class="col-12 px-3 px-md-2">
              <label for="tahun" class="form-label mb-1">Tahun SPP</label>
              <input type="text" name="tahun" class="form-control form-control-smx roundedx @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}" placeholder="ex: 2023" id="tahun" autocomplete="off">
              @error('tahun')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12 px-3 px-md-2">
              <label for="nominal" class="form-label mb-1">Nominal</label>
              <div class="input-group">
                <span class="input-group-text text-blue fw-bold">Rp</span>
                <input type="text" name="nominal" class="form-control form-control-smx @error('nominal') is-invalid @enderror" value="{{ old('nominal') }}" placeholder="100.000" id="nominal" autocomplete="off">
                @error('nominal')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="text-end px-3 px-md-2">
              <button type="submit" class="btnn btn-violet py-2 ps-4 mb-3">Simpan <i class="bi bi-chevron-right px-1"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('my-js')
<script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="/vendor/extensions/simple-datatables.js"></script>
<script type="text/javascript">
  var nominal = document.getElementById('nominal');
    nominal.addEventListener('keyup', function(e)
    {
        nominal.value = formatRupiah(this.value);
    });
  function formatRupiah(angka, prefix)
  {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split    = number_string.split(','),
          sisa     = split[0].length % 3,
          rupiah     = split[0].substr(0, sisa),
          ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
      if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
      }
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>
@endsection

