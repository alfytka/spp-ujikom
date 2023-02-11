<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SPP - Siswa</title>

    <link rel="stylesheet" href="/vendor/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="/siswa-style/css/main/app.css" />
    <link rel="stylesheet" href="/siswa-style/css/main/app-dark.css" />
    <link rel="shortcut icon" href="/siswa-style/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="/siswa-style/images/logo/favicon.png" type="image/png" />

    <link rel="stylesheet" href="/siswa-style/css/shared/iconly.css" />
    <link rel="stylesheet" href="/siswa-style/css/siswacss-me.css"/>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('partials.siswa.sidebar')
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="modal fade text-left modal-borderless" id="default" tabindex="-1" role="dialog"
              aria-labelledby="myModalLabel1" data-bs-backdrop="false" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="myModalLabel1">Logout</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>
                        Keluar dari Aplikasi Pembayaran SPP?
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                      <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                      <i class="bx bx-check d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Ya, keluar</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            @yield('content')

            <!-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="#">@Alfitka</a></p>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
    <script src="/siswa-style/js/bootstrap.js"></script>
    <script src="/siswa-style/js/app.js"></script>

</body>

</html>
