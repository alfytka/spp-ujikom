@can('admin')

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item border-right">
    <a href="/dashboard" class="nav-link {{ Request::is('dashboard*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-back"></i>
        <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-heading">Data</li>

  <li class="nav-item">
    <a href="/datakelas" class="nav-link {{ Request::is('datakelas*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-text-wrap"></i>
      <span>Data Kelas</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="/dataprodi" class="nav-link {{ Request::is('dataprodi*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-asterisk"></i>
      <span>Data Prodi</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="/datasiswa" class="nav-link {{ Request::is('datasiswa*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-universal-access"></i>
      <span>Data Siswa</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="{{ route('datapetugas.index') }}" class="nav-link {{ Request::is('datapetugas*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-person-workspace"></i>
      <span>Data Petugas</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="{{ route('dataadmin.index') }}" class="nav-link {{ Request::is('dataadmin*')?'fw-bold':'collapsed' }}">
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
    <a href="{{ route('datapembayaran.index') }}" class="nav-link {{ Request::is(['datapembayaran','datapembayaran/*/edit','datapembayaran/*'])?'fw-bold':'collapsed' }}">
      <i class="bi bi-palette2"></i>
      <span>Data Pembayaran</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-heading">Transaksi</li>

  <li class="nav-item">
    <a href="{{ route('datapembayaran.create') }}" class="nav-link {{ Request::is(['datapembayaran/create','datapembayaran/*/detail-siswa'])?'fw-bold':'collapsed' }}">
      <i style="margin-right: 10px;">Rp</i>
      <span>Entri Pembayaran</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="{{ route('history.index') }}" class="nav-link {{ Request::is('history*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-clock-history"></i>
      <span>History Pembayaran</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-heading">Laporan</li>

  <li class="nav-item">
    <a href="{{ route('laporan.index') }}" class="nav-link {{ Request::is('laporan*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-clipboard-check"></i>
      <span>Laporan</span>
    </a>
  </li><!-- End Dashboard Nav -->

</ul>

@endcan
  
@can('petugas')
  
<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-heading">Menu Petugas</li>

  <li class="nav-item border-right">
    <a href="/dashboard" class="nav-link {{ Request::is('dashboard*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-back"></i>
        <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item border-right">
    <a href="/datasiswa" class="nav-link {{ Request::is('datasiswa*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-universal-access"></i>
        <span>Data Siswa</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="{{ route('datapembayaran.index') }}" class="nav-link {{ Request::is('datapembayaran*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-palette2"></i>
      <span>Data Pembayaran</span>
    </a>
  </li><!-- End Dashboard Nav -->

  {{-- <li class="nav-heading">Transaksi</li> --}}

  <li class="nav-item">
    <a href="{{ route('datapembayaran.create') }}" class="nav-link {{ Request::is('datapembayaran/create*')?'fw-bold':'collapsed' }}">
      <i style="margin-right: 10px;">Rp</i>
      <span>Entri Pembayaran</span>
      <i class="bi bi-arrow-left mx-auto"></i>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="{{ route('history.index') }}" class="nav-link {{ Request::is('history*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-clock-history"></i>
      <span>History Pembayaran</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="{{ route('laporan.index') }}" class="nav-link {{ Request::is('laporan*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-clipboard-check"></i>
      <span>Laporan</span>
    </a>
  </li><!-- End Dashboard Nav -->
  
  <li class="nav-heading">Lainnya</li>
  
  <li class="nav-item">
    <a href="/profile" class="nav-link {{ Request::is('profile*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-universal-access-circle"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="#" data-bs-toggle="modal" data-bs-target="#disablebackdrop" class="nav-link collapsed">
      <i class="bi bi-chevron-left text-danger"></i>
      <span class="text-danger">Logout</span>
    </a>
  </li><!-- End Dashboard Nav -->

</ul>

@endcan

@can('siswa')
  
<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-heading">Menu</li>

  <li class="nav-item border-right">
    <a href="/siswa/{{ auth()->user()->id }}/beranda" class="nav-link {{ Request::is('siswa/*/beranda')?'fw-bold':'collapsed' }}">
      <i class="bi bi-back"></i>
        <span>Beranda</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item border-right">
    <a href="/siswa/{{ auth()->user()->id }}/fyi" class="nav-link {{ Request::is('siswa/*/fyi')?'fw-bold':'collapsed' }}">
      <i class="bi bi-app-indicator"></i>
        <span>FYI</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="/siswa/{{ auth()->user()->id }}/entri-pembayaran" class="nav-link {{ Request::is('siswa/*/entri-pembayaran')?'fw-bold':'collapsed' }}">
      <i style="margin-right: 10px;">Rp</i>
      <span>Entri Pembayaran</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="/siswa/{{ auth()->user()->id }}/riwayat-pembayaran" class="nav-link {{ Request::is('siswa/*/riwayat-pembayaran')?'fw-bold':'collapsed' }}">
      <i class="bi bi-clock-history"></i>
      <span>Riwayat Pembayaran</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a href="{{ route('profile-siswa.index') }}" class="nav-link {{ Request::is('profile-siswa*')?'fw-bold':'collapsed' }}">
      <i class="bi bi-universal-access"></i>
      <span>Profile Siswa</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-heading mb-0">Keluar</li>

  <li class="nav-item">
    <a href="#" data-bs-toggle="modal" data-bs-target="#disablebackdrop" class="nav-link collapsed">
      <i class="bi bi-chevron-left text-danger"></i>
      <span class="text-danger">Logout</span>
    </a>
  </li><!-- End Dashboard Nav -->

</ul>

@endcan
