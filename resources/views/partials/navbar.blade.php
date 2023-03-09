@can('admin')
<div class="d-flex align-items-center justify-content-between">
  <a href="/dashboard" class="logo ps-md-3 d-flex align-items-center">
    <i class="fw-bold fs-5 me-1 d-none d-md-inline">SPP</i>
    <span class="d-none d-md-block fst-italic">admin</span>
    <small class="badge badge-grey fs-sm rounded-pill py-1 px-2 ms-2 d-none d-lg-block">lvl. administrator</small>
  </a>
  <i class="bi bi-three-dots toggle-sidebar-btn"></i>
</div>

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item me-3">
      <a class="nav-link">
        <span class="badge badge-blue fs-sm rounded-pill py-2 px-3"><i class="bi bi-chevron-left me-1"></i><span class="d-none d-md-inline"><span class="fw-bold">Aplikasi Pembayaran SPP</span> - SMK TI Nusadua</span><span class="d-inline d-md-none fw-bold">mySPP</span></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link nav-icon">
        <i class="border-start"></i>
      </a>
    </li>

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-md-3 pe-lg-3" href="#" data-bs-toggle="dropdown">
        <span class="d-block pe-3">{{ Str::limit(auth()->user()->username, $limit = 9, $end = '..') }}</span>
        @if (auth()->user()->foto > 1)
          <img src="/img/photo-petugas/{{ auth()->user()->foto }}" alt="Profile" class="rounded-circle border">
        @else
          <img src="/img/profile-img.jpg" alt="Profile" class="rounded-circle border">
        @endif
      </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6 class="fw-semibold">{{ auth()->user()->username }}</h6>
          <span>{{ auth()->user()->level }}</span>
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="/pengaturan">
            <i class="bi bi-gear"></i>
            <span>Pengaturan</span>
          </a>
        </li>

        <li class="mb-2">
          <a class="dropdown-item d-flex align-items-center text-danger" href="#" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
            <i class="bi bi-chevron-left"></i>
            <span>Logout</span>
          </a>
        </li>

      </ul>
    </li>

  </ul>
</nav>
    
@endcan

@can('petugas')
<div class="d-flex align-items-center justify-content-between">
  <a href="/dashboard" class="logo ps-md-3 d-flex align-items-center">
    <i class="fw-bold fs-5 me-1 d-none d-md-inline">SPP</i>
    <span class="d-none d-md-block fst-italic">petugas</span>
    <small class="badge badge-grey fs-sm rounded-pill py-1 px-2 ms-2 d-none d-lg-block">lvl. petugas</small>
  </a>
  <i class="bi bi-three-dots toggle-sidebar-btn"></i>
</div>

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item me-3">
      <a class="nav-link">
        <span class="badge badge-blue fs-sm rounded-pill py-2 px-3"><i class="bi bi-chevron-left me-1"></i><span class="d-none d-md-inline"><span class="fw-bold">Aplikasi Pembayaran SPP</span> - SMK TI Nusadua</span><span class="d-inline d-md-none fw-bold">mySPP</span></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link nav-icon">
        <i class="border-start"></i>
      </a>
    </li>

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-md-3 pe-lg-3" href="#" data-bs-toggle="dropdown">
        <span class="d-block pe-3">{{ Str::limit(auth()->user()->username, $limit = 9, $end = '..') }}</span>
        @if (auth()->user()->foto > 1)
          <img src="/img/photo-petugas/{{ auth()->user()->foto }}" alt="Profile" class="rounded-circle border">
        @else
          <img src="/img/profile-img.jpg" alt="Profile" class="rounded-circle border">
        @endif
      </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6 class="fw-semibold">{{ auth()->user()->username }}</h6>
          <span>{{ auth()->user()->level }}</span>
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li>

        <li class="mb-2">
          <a class="dropdown-item d-flex align-items-center text-danger" href="#" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
            <i class="bi bi-chevron-left"></i>
            <span>Logout</span>
          </a>
        </li>

      </ul>
    </li>

  </ul>
</nav>
    
@endcan

@can('siswa')
<div class="d-flex align-items-center justify-content-between">
  <a href="/dashboard" class="logo ps-md-3 d-flex align-items-center">
    <i class="fw-bold fs-5 me-1 d-none d-md-inline">SPP</i>
    <span class="d-none d-md-block fst-italic">siswa</span>
    <small class="badge badge-grey fs-sm rounded-pill py-1 px-2 ms-2 d-none d-lg-block">lvl. siswa</small>
  </a>
  <i class="bi bi-three-dots toggle-sidebar-btn"></i>
</div>

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item me-3">
      <a class="nav-link">
        <span class="badge badge-blue fs-sm rounded-pill py-2 px-3"><i class="bi bi-chevron-left me-1"></i><span class="d-none d-md-inline"><span class="fw-bold">Aplikasi Pembayaran SPP</span> - SMK TI Nusadua</span><span class="d-inline d-md-none fw-bold">mySPP</span></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link nav-icon">
        <i class="border-start"></i>
      </a>
    </li>

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-md-3 pe-lg-3" href="#" data-bs-toggle="dropdown">
        <span class="d-block pe-3">{{ Str::limit(auth()->user()->username, $limit = 9, $end = '..') }}</span>
        @if (auth()->user()->foto > 1)
          <img src="/img/photo-siswa/{{ auth()->user()->foto }}" alt="Profile" class="rounded-circle border">
        @else
          <img src="/img/profile-img.jpg" alt="Profile" class="rounded-circle border">
        @endif
      </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li>
          <a class="dropdown-item d-flex align-items-center" href="/profile-siswa">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li>

        <li class="mb-2">
          <a class="dropdown-item d-flex align-items-center text-danger" href="#" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
            <i class="bi bi-chevron-left"></i>
            <span>Logout</span>
          </a>
        </li>

      </ul>
    </li>

  </ul>
</nav>
    
@endcan