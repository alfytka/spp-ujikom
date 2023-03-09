<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SPP - Print Pembayaran</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">

</head>

<body id="laporan">

    <div class="row mt-2 mx-0">
      <div class="col-12 mb-2 d-flex">
        @if ($detailpembayaran->logo > 1)
          <img src="/img/img-me/{{ $detailpembayaran->logo }}" class="logosmk" style="max-height: 90px;" alt="logo">
        @else
          <img src="/img/logosmk.png" class="" style="max-height: 40px;" alt="logo">
        @endif
        <div class="destinasi my-2 ms-3">
          <h5 class="mb-0">{{ $sekolah->nama_sekolah }}</h5>
        </div>
        <span class="fs-10" style="position: absolute; right: 0px; margin: 9px 10px 0 0;">Tanggal: {{ $detailpembayaran->tgl_bayar }}</span>
      </div>

      {{-- <div class="border-bottom border-dark mx-2"></div> --}}
      <div class="border-bottom mx-0"></div>
      {{-- <div class="border-bottom border-2 border-dark mx-2" style="margin: 1px 0;"></div> --}}
      {{-- <div class="border-bottom border-dark mx-2"></div> --}}

    </div>

    <div class="row mx-0 mt-4 identity">
      <div class="col-12 text-center">
        <h6 class="fs-sm fw-bold"><u>BUKTI PEMBAYARAN SPP</u></h6>
      </div>
      <div class="row mt-3">
        <div class="col-8" style="font-size:12px; text-transform:uppercase;">
          <span class="fw-bold fs-sm">{{ $detailpembayaran->userSiswa->name }}</span><br>
          <span class="fw-normal fs-sm pt-0">{{ $detailpembayaran->userSiswa->kelas->kompetensikeahlian->name }} - {{ $detailpembayaran->userSiswa->kelas->kelas }}</span><br>
        </div>
        <div class="col-4">
          <span class="fw-normal fs-sm pt-0">PEMBAYARAN <br><b>SPP</b></span><br>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mt-1">
          <span class="fw-normal fs-sm pt-0">Tanggal Pembayaran <span class="ms-2">: {{ $detailpembayaran->created_at }}</span></span>
        </div>
        <div class="col-4">
          <span class="fw-normal fs-sm">{{ $detailpembayaran->bulan_bayar }} {{ $detailpembayaran->tahun_bayar }}</span>
        </div>
      </div>
    </div>

    <div class="mx-auto border-bottom mt-2"></div>

    <div class="row mx-0 mt-2 identity">
      <div class="col-12" style="font-size: 12px;">
        <span class="fs-sm">Status Pembayaran <span class="ms-3">: <b>Sukses</b></span></span><br>
        <span class="fw-normal fs-sm pt-0">Uang Sejumlah <span class="ms-4" style="padding-left: 12px;">: </span></span><br>
      </div>
    </div>

    <div class="row mx-0 mt-4">
      <div class="col-9 mt-4">
        <div class="row">
          <div class="col-1">
          </div>
          <div class="col-4">
            <div class="card-body border" style="height: 50px;">
              <p class="mt-2 pt-1 mb-0 text-center fw-bold">Rp{{ number_format($detailpembayaran->jumlah_bayar, 0, '.', '.') }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="me-5" style="font-size: 12px;">
          <span>Petugas</span>
          <p class="pt-5 mt-3 fw-bold">{{ $detailpembayaran->userPetugas->name }}</p>
        </div>
      </div>
    </div>

  <script type="text/javascript">
    // addEventListener('load', function myfunction() {
    //   window.print()
    // });

    function terbilang(angka) {
  var bilangan = [
    "", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh",
    "sebelas", "dua belas", "tiga belas", "empat belas", "lima belas", "enam belas", "tujuh belas", "delapan belas", "sembilan belas"
  ];
  var satuan = ["", "puluh", "ratus", "ribu", "puluh ribu", "ratus ribu", "juta", "puluh juta", "ratus juta", "miliar", "puluh miliar", "ratus miliar", "triliun", "puluh triliun", "ratus triliun"];
  var bil = "";
  var i = 0;
  if (angka == 0) {
    bil = "nol";
  } else {
    while (angka > 0) {
      var temp = angka % 1000;
      if (temp > 0) {
        var j = 0;
        var temp_bil = "";
        while (temp > 0) {
          var temp2 = temp % 10;
          temp = Math.floor(temp / 10);
          temp_bil = bilangan[temp2] + " " + satuan[j] + " " + temp_bil;
          j++;
        }
        bil = temp_bil + satuan[i] + " " + bil;
      }
      angka = Math.floor(angka / 1000);
      i += 3;
    }
  }
  return bil.trim();
}

var angka = 123456789;
var hasil = terbilang(angka);
console.log(angka.toLocaleString('id-ID') + " rupiah sama dengan " + hasil + " rupiah.");

  </script>

</body>

</html>