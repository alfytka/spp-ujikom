@can('admin')
<div class="d-flex align-items-center justify-content-between">
  <a href="/dashboard" class="logo ps-md-3 d-flex align-items-center">
    <span class="d-none d-lg-block">SPP - Admin</span>
  </a>
  <i class="bi bi-three-dots toggle-sidebar-btn"></i>
</div>

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none justify-content-center">
      <a class="nav-link nav-icon align-items-center">
        <span class="small-title my-small-title text-center">SPP</span>
      </a>
    </li>

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-md-3 pe-lg-3" href="#" data-bs-toggle="dropdown">
        <span class="d-none d-md-block pe-3">{{ auth()->user()->username }}</span>
        @if (auth()->user()->foto > 1)
          <img src="/img/photo-petugas/{{ auth()->user()->foto }}" alt="Profile" class="rounded-circle border">
        @else
          <img src="/img/profile-img.jpg" alt="Profile" class="rounded-circle border">
        @endif
      </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>{{ auth()->user()->username }}</h6>
          <span>{{ auth()->user()->level }}</span>
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-info-circle"></i>
            <span>About</span>
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
    <span class="d-none d-lg-block">SPP - Petugas</span>
  </a>
  <i class="bi bi-three-dots toggle-sidebar-btn"></i>
</div>

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none justify-content-center">
      <a class="nav-link nav-icon align-items-center">
        <span class="small-title my-small-title text-center">SPP</span>
      </a>
    </li>

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-md-3 pe-lg-3" href="#" data-bs-toggle="dropdown">
        <span class="d-none d-md-block pe-3">{{ auth()->user()->username }}</span>
        @if (auth()->user()->foto > 1)
          <img src="/img/photo-petugas/{{ auth()->user()->foto }}" alt="Profile" class="rounded-circle border">
        @else
          <img src="/img/profile-img.jpg" alt="Profile" class="rounded-circle border">
        @endif
      </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>{{ auth()->user()->username }}</h6>
          <span>{{ auth()->user()->level }}</span>
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-info-circle"></i>
            <span>About</span>
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
    <span class="d-none d-lg-block">SPP - Siswa</span>
  </a>
  <i class="bi bi-three-dots toggle-sidebar-btn"></i>
</div>

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none justify-content-center">
      <a class="nav-link nav-icon align-items-center">
        <span class="small-title my-small-title text-center">SPP</span>
      </a>
    </li>

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-md-3 pe-lg-3" href="#" data-bs-toggle="dropdown">
        <span class="d-none d-md-block pe-3">{{ auth()->user()->username }}</span>
        @if (auth()->user()->foto > 1)
          <img src="/img/photo-siswa/{{ auth()->user()->foto }}" alt="Profile" class="rounded-circle border">
        @else
          <img src="/img/profile-img.jpg" alt="Profile" class="rounded-circle border">
        @endif
      </a>

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>{{ auth()->user()->username }}</h6>
          <span>{{ auth()->user()->level }}</span>
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-info-circle"></i>
            <span>About</span>
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