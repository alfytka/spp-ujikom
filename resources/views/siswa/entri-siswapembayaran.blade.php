@extends('layouts.admin.kerangka')
@section('titles')
  <title>SPP - Entri Pembayaran</title>
@endsection
@section('content')
  
<div class="pagetitle mb-0">
    <h5 class="fw-semibold">Entri Pembayaran</h5> 
</div>

<section class="section dashboard mb-5">
  <div class="row">

    <div class="col-lg-10">

      <div class="cardxy shadow-sm">
        <div class="card-body">
          <h5 class="card-title ms-2">Input Pembayaran</h5>

          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="/siswa/{{ auth()->user()->id }}/entri-pembayaran" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12 col-md-6 col-lg-6 pe-2 pe-md-3 pe-lg-3">

              <div class="form-group mb-3">
                <label for="kelas_id" class="form-label mb-1">Kelas</label>
                <select name="kelas_id" class="form-select form-select-smx roundedx @error('kelas_id') is-invalid @enderror" id="kelas_id">
                  <option disabled value>- Pilih kelas -</option>
                  <option value="{{ auth()->user()->kelas->id }}">{{ auth()->user()->kelas->kelas }}</option>
                </select>
                @error('kelas_id')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="name" class="form-label mb-1">Nama Siswa</label>
                <select name="siswa_id" class="form-select form-select-smx roundedx @error('siswa_id') is-invalid @enderror" id="siswa_id">
                  <option disabled value>- Nama Siswa -</option>
                  <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                </select>
                @error('name')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="row">
                <div class="col-6 pe-2">
                  <div class="form-group mb-3">
                    <label for="tgl_bayar" class="form-label mb-1">Tanggal Bayar</label>
                    <input type="date" name="tgl_bayar" value="{{ old('tgl_bayar') }}" class="form-control form-control-smx roundedx @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar">
                  </div>
                </div>
                <div class="col-6 ps-2  ">
                  <div class="form-group mb-3">
                    <label for="bulan_bayar" class="form-label mb-1">Bulan Bayar</label>
                    <select name="bulan_bayar" id="bulan_bayar" class="form-select form-select-smx roundedx @error('bulan_bayar') is-invalid @enderror">
                      <option disabled value>- Pilih bulan bayar -</option>
                        <option disabled selected hidden>- Pilih bulan bayar -</option>
                        @foreach ($bulans as $bulan)
                          <option value="{{ $bulan }}" {{ old('bulan_bayar') == $bulan ? 'selected' : '' }}>{{ $bulan }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-6 pe-2">
                  <div class="form-group mb-3">
                    <label for="tahun_bayar" class="form-label mb-1">Tahun Bayar</label>
                    <input type="text" value="{{ old('tahun_bayar') }}" class="form-control form-control-smx roundedx @error('tahun_bayar') is-invalid @enderror" name="tahun_bayar" placeholder="ex: 2020" autocomplete="off" id="tahun_bayar">
                  </div>
                </div>
                <div class="col-6 ps-2  ">
                  <div class="form-group mb-3">
                    <label for="jumlah_bayar" class="form-label mb-1">Jumlah Bayar</label>
                    <div class="input-group">
                      <span class="input-group-text">Rp</span>
                      <input type="text" name="jumlah_bayar" class="form-control form-control-smx rounded-r @error('jumlah_bayar') is-invalid @enderror" value="{{ number_format(auth()->user()->spp->nominal, 0, '', '') }}" placeholder="100.000" id="jumlah_bayar" autocomplete="off" readonly>
                      @error('jumlah_bayar')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group mb-3">
                <label for="jenis_pembayaran" class="form-label mb-1">Jenis Pembayaran</label>
                <select name="jenis_pembayaran" class="form-select form-select-smx roundedx @error('jenis_pembayaran') is-invalid @enderror" id="jenis_pembayaran">
                  <option disabled value>- Pilih jenis pembayaran -</option>
                  <option value="siswa">Mandiri - oleh siswa</option>
                  {{-- @foreach ($datakelas as $kelas)
                    <option disabled selected hidden>- Pilih kelas -</option>
                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                  @endforeach --}}
                </select>
              </div>

            </div>

            <div class="col-12 col-md-6 col-lg-6 ps-2 ps-md-3 ps-lg-3 mt-0 mt-md-3 mt-lg-3">

              <div class="form-group mb-3">
                <label for="metode_pembayaran" class="form-label mb-1">Metode Pembayaran</label>
                <select name="metode_pembayaran" class="form-select form-select-smx roundedx @error('metode_pembayaran') is-invalid @enderror" id="metode_pembayaran">
                  <option disabled value>- Pilih metode pembayaran -</option>
                  <option disabled selected hidden>- Pilih metode pembayaran -</option>
                  <option value="Transfer Bank" {{ old('metode_pembayaran') }}>Transfre Bank</option>
                </select>
                @error('metode_pembayaran')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-2">
                <label for="foto_bukti" class="form-label mb-1">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control roundedx @error('foto_bukti') is-invalid @enderror" name="foto_bukti" id="foto_bukti" onchange="loadFile(event)" accept="image/*">
                @error('foto_bukti')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <input type="hidden" name="status" value="diproses">

              <div class="col-12 border roundedx mb-2 text-center overflow-hidden">
                <img src="/img/defaultbukti.jpg" alt="buktitransfer" class="" style="height: 237px; max-width:330px; object-fit: contain;" id="output">
              </div>
                  
              <div class="text-end ">
                <button type="submit" class="btnn btn-violet py-2 ps-4 mt-1 mb-3">Ajukan Pembayaran <i class="bi bi-chevron-right px-1"></i></button>
              </div>
            </div>
            
          </form>

        </div>
      </div>

    </div>

  </div>
</section>
@endsection

@section('my-js')
<script type="text/javascript">
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endsection