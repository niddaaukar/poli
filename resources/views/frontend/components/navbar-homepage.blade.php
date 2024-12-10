<!-- Header -->
<header id="header" class="header d-flex align-items-center fixed-top bg-light shadow-sm">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <!-- Logo -->
    <a href="index.html" class="logo d-flex align-items-center">
      <h1 class="sitename text-primary fw-bold">Poliklinik</h1>
    </a>
    <!-- Navigation Menu -->
    <nav id="navmenu" class="navmenu d-flex align-items-center">
      <ul class="nav d-flex align-items-center">
        <li class="nav-item">
          <a href="#hero" class="nav-link text-primary fw-bold active">Beranda</a>
        </li>
        <li class="nav-item">
          <a href="#about" class="nav-link text-dark">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a href="#services" class="nav-link text-dark">Layanan</a>
        </li>
        <li class="nav-item">
          <a href="#contact" class="nav-link text-dark">Kontak Kami</a>
        </li>
      </ul>
    </nav>
    <!-- Auth Buttons -->
    <div class="auth-buttons d-flex align-items-center">
      @php
        $authUser = getAuthenticatedUser();
      @endphp
      @if ($authUser)
        <div class="dropdown">
          <a class="btn btn-light dropdown-toggle shadow-sm text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $authUser->nama ?? 'Pengguna tidak ditemukan' }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            @if (Auth::guard('pasien')->check())
              <li><a class="dropdown-item" href="">Profil</a></li>
              <li><a class="dropdown-item" href="">Riwayat Periksa</a></li>
            @elseif (Auth::guard('dokter')->check())
              <li><a class="dropdown-item" href="{{ route('dokter.dashboard') }}">Dashboard</a></li>
            @elseif (Auth::guard('admin')->check())
              <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            @endif
            <li>
              <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </div>
      @else
        <a href="{{ route('register') }}" class="btn btn-primary shadow-sm mx-2">Daftar Sebagai Pasien</a>
        <a href="{{ route('login') }}" class="btn btn-warning shadow-sm">Login</a>
      @endif
    </div>
  </div>
</header>
