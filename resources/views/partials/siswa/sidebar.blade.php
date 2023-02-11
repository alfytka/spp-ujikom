<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
      <div class="d-flex justify-content-between align-items-center">
        <div class="logo">
          <a href="index.html"><img src="/siswa-style/images/logo/logo.svg" alt="Logo" srcset="" /></a>
        </div>
        <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
          <div class="form-check form-switch fs-6">
            <input class="form-check-input me-0" type="checkbox" id="toggle-dark" />
            <label class="form-check-label"></label>
          </div>
          
        </div>
        <div class="sidebar-toggler x">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Request::is('beranda*') ? 'active' : '' }}">
          <a href="index.html" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Beranda Siswa</span>
          </a>
        </li>

        <li class="sidebar-item {{ Request::is('beranda*') ? 'active' : '' }}">
          <a href="form-layout.html" class="sidebar-link">
            <i class="bi bi-wallet"></i>
            <span>Transaksi</span>
          </a>
        </li>

        <li class="sidebar-item {{ Request::is('beranda*') ? 'active' : '' }}">
          <a href="form-layout.html" class="sidebar-link">
            <i class="bi bi-clock-history"></i>
            <span>Riwayat Pembayaran</span>
          </a>
        </li>

        <li class="sidebar-item {{ Request::is('profilesiswa*') ? 'active' : '' }}">
          <a href="/profilesiswa" class="sidebar-link">
            <i class="bi bi-person"></i>
            <span>Profil Siswa</span>
          </a>
        </li>

        <li class="sidebar-item sidebar-item-me {{ Request::is('beranda*') ? 'active' : '' }}">
          <a class="sidebar-link" data-bs-toggle="modal"
          data-bs-target="#default">
            <i class="bi bi-chevron-left"></i>
            <span>Logout</span>
          </a>
        </li>

      </ul>
    </div>
  </div>