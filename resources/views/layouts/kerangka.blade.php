<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  @yield('titles')
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="/vendor/extensions/simple-datatables/style.css">
  <link rel="stylesheet" href="/vendor/extensions/simple-datatables.css">

  <link href="/css/style.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    @include('partials.navbar')
  </header>

  <aside id="sidebar" class="sidebar">
    @include('partials.sidebar')
  </aside>

  <main id="main" class="main">

    <div class="modal modal-sm fade py-5" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
      <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
          <div class="modal-header border-bottom-0">
            <h1 class="modal-title fs-5">Logout</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body py-0 mb-1">
            Keluar dari Aplikasi Pembayaran SPP?
          </div>
          <div class="modal-footer border-top-0 ">
            <form action="/logout" method="POST" class="w-100">
              @csrf
              <button type="submit" class="button-9 w-100 mx-0 mb-2 roundedx">Ya, keluar!</button>
            </form>
            <button type="button" class="btn-y w-100 mx-1" data-bs-dismiss="modal">Batal</button>
          </div>
        </div>
      </div>
    </div>

    @yield('content')

  </main>

  {{-- ======= Footer =======  
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright 2023 - <strong><span>@Alfitka</span></strong>
    </div>
  </footer> 
   End Footer --> --}}

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @yield('my-js')

  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/tinymce/tinymce.min.js"></script>
  {{-- <script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/vendor/extensions/simple-datatables.js"></script> --}}

  <script src="/js/main.js"></script>

</body>

</html>