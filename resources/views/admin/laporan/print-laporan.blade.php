<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SPP - Print Laporan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon"> -->
    {{-- <link href="/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/css/style.css" rel="stylesheet">

</head>

<body>

    <div class="row mt-2 mx-0">
      <div class="col-12 text-center mb-4">
        <img src="/img/logosmk.png" class="logosmk" style="max-height: 90px;" alt="">
        <div class="destinasi mt-3">
          <h5 class="mb-0">LAPORAN PEMBAYARAN SPP</h5>
          <h5 class="mb-0">SMK NEGERI 3 BANJAR</h5>
          <small>Jl. Julaeni, Kec. Langensari, Kota Banjar, Jawa barat</small>
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
            <td>Rp{{ number_format($laporan->jumlah_bayar) }}</td>
          </tr>
              
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="row mx-0 mt-5">
      <div class="col-12">
        <div class="ttd me-4">
          <span>Mengetahui,</span>
          <p style="margin: 0 0 75px 0;">Kepala SMK Negeri 3 Banjar</p>
          <span class="pt-5 fw-bold">Drs. H. Maman Sudirman, M.M</span>
          <p>NIP. 19651021 199011 1 00</p>
        </div>
      </div>
    </div>


  <!-- Vendor JS Files -->
  <script type="text/javascript">
    addEventListener('load', function myfunction() {
      window.print()
    });
  </script>

  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>

</body>

</html>