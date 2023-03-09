<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SPP - Print Laporan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">

</head>

<body id="laporan">

    <div class="row mt-2 mx-0">
      <div class="col-12 text-center mb-4">
        @if ($datasekolah[0]->logo > 1)
          <img src="/img/img-me/{{ $datasekolah[0]->logo }}" class="logosmk" style="max-height: 90px;" alt="logo">
        @else
          <img src="/img/logosmk.png" class="logosmk" style="max-height: 90px;" alt="logo">
        @endif
        <div class="destinasi mt-3">
          <h5 class="mb-0">LAPORAN PEMBAYARAN SPP</h5>
          <h5 class="mb-0">{{ $datasekolah[0]->nama_sekolah }}</h5>
          <small>Telp. {{ $datasekolah[0]->telepon }}, {{ $datasekolah[0]->alamat }}</small>
        </div>

      </div>

      {{-- <div class="border-bottom border-dark mx-2"></div> --}}
      <div class="border-bottom border-dark mx-0"></div>
      {{-- <div class="border-bottom border-2 border-dark mx-2" style="margin: 1px 0;"></div> --}}
      {{-- <div class="border-bottom border-dark mx-2"></div> --}}

    </div>

    <div class="row mx-0 mt-4 identity">
      <div class="col-12 ">
        <span class="fw-bold fs-sm">LAPORAN TRANSAKSI PEMBAYARAN SPP PER</span>
      </div>
      <div class="col-12 ">
        <span style="margin-right: 14px;">Tanggal</span><span class="ms-5 me-2">:</span><span> {{ request('tanggal_awal') }} s/d {{ request('tanggal_akhir') }}</span>
      </div>
      <div class="col-12 ">
        <span>Nama Petugas</span><span class="ms-4 me-2">:</span><span> {{ $datalaporan[0]->userPetugas->name }}</span>
      </div>
    </div>

    <div class="row mx-0 mt-4">
      <table class="table table-bordered table-sm my-table">
        <thead>
          <tr class="align-middle">
            <th>No</th>
            <th>Waktu Transaksi</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tanggal Bayar</th>
            <th>Bulan & Tahun Bayar</th>
            <th>Nominal Bayar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datalaporan as $laporan)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $laporan->created_at }}</td>
            <td>{{ $laporan->userSiswa->name }}</td>
            <td>{{ $laporan->userSiswa->kelas->kelas }}</td>
            <td>{{ $laporan->tgl_bayar }}</td>
            <td>{{ $laporan->bulan_bayar }} {{ $laporan->tahun_bayar }}</td>
            <td>Rp{{ number_format($laporan->jumlah_bayar, 0, '.', '.') }}</td>
          </tr>
              
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="row mx-0 mt-5">
      <div class="col-12">
        <div class="ttd me-4">
          <span>Mengetahui,</span>
          <p style="margin: 0 0 75px 0;">Kepala {{ $datasekolah[0]->nama_sekolah }}</p>
          <span class="pt-5 fw-bold">{{ $datasekolah[0]->kepala_sekolah }}</span>
          <p>NIP. {{ $datasekolah[0]->nip }}</p>
        </div>
      </div>
    </div>

  <script type="text/javascript">
    addEventListener('load', function myfunction() {
      window.print()
    });
  </script>

</body>

</html>