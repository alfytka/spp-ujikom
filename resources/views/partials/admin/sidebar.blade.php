
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a href="/dashboard" class="nav-link {{ Request::is('dashboard*')?'fw-bold':'collapsed' }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Data</li>

    <li class="nav-item">
      <a href="/datakelas" class="nav-link {{ Request::is('datakelas*')?'fw-bold':'collapsed' }}">
        <i class="bi bi-calendar3"></i>
        <span>Data Kelas</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a href="/dataprodi" class="nav-link {{ Request::is('dataprodi*')?'fw-bold':'collapsed' }}">
        <i class="bi bi-calendar3-week"></i>
        <span>Data Prodi</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a href="/datasiswa" class="nav-link {{ Request::is('datasiswa*')?'fw-bold':'collapsed' }}">
        <i class="bi bi-person-vcard"></i>
        <span>Data Siswa</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a href="#" class="nav-link {{ Request::is('xx*')?'fw-bold':'collapsed' }}">
        <i class="bi bi-person-workspace"></i>
        <span>Data Petugas</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a href="#" class="nav-link {{ Request::is('xx*')?'fw-bold':'collapsed' }}">
        <i class="bi bi-person-workspace"></i>
        <span>Data Admin</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a href="{{ route('dataspp.index') }}" class="nav-link {{ Request::is('dataspp*')?'fw-bold':'collapsed' }}">
        <i class="bi bi-book-half"></i>
        <span>Data SPP</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a href="#" class="nav-link {{ Request::is('xx*')?'fw-bold':'collapsed' }}">
        <i class="bi bi-palette2"></i>
        <span>Data Pembayaran</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Transaksi</li>

    <li class="nav-item">
      <a href="#" class="nav-link {{ Request::is('xx*')?'fw-bold':'collapsed' }}">
        <i style="margin-right: 10px;">Rp</i>
        <span>Entri Pembayaran</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a href="#" class="nav-link {{ Request::is('xx*')?'fw-bold':'collapsed' }}">
        <i class="bi bi-clock-history"></i>
        <span>History Pembayaran</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Laporan</li>

    <li class="nav-item">
      <a href="#" class="nav-link {{ Request::is('xx*')?'fw-bold':'collapsed' }}">
        <i class="bi bi-clipboard-check"></i>
        <span>Laporan</span>
      </a>
    </li><!-- End Dashboard Nav -->

  </ul>
