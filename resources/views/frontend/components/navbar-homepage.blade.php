<!-- Header -->
<header id="header" class="header d-flex align-items-center fixed-top bg-light shadow-sm">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
    <img src="{{ asset('img/logo-poli.png') }}" alt="Logo Poliklinik" class="me-2">
    <h1 class="sitename fw-bold">
        <span class="text-primary">POLI</span><span class="text-warning"> Klinik</span>
    </h1>
</a>
    <!-- Navigation Menu -->
    <nav id="navmenu" class="navmenu d-flex align-items-center">
      <ul class="nav d-flex align-items-center">
        <li class="nav-item">
          <a href="#hero" class="nav-link {{ Request::is('homepage') ? 'active' : '' }}">Beranda</a>
        </li>
        <li class="nav-item me-3">
            <a class="nav-link {{ Request::is('tentang-kami') ? 'active' : '' }}" href="#tentang-kami">Tentang Kami</a>
        </li>
        <li class="nav-item me-3">
            <a class="nav-link {{ Request::is('layanan') ? 'active' : '' }}" href="#layanan">Layanan</a>
        </li>
        <li class="nav-item me-3">
            <a class="nav-link {{ Request::is('testimoni') ? 'active' : '' }}" href="#testimoni">Testimoni</a>
        </li>
        <li class="nav-item me-3">
            <a class="nav-link {{ Request::is('faq') ? 'active' : '' }}" href="#faq">FAQ</a>
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
              <li><a class="dropdown-item" href="{{ route('pasien.profil.index') }}">Profil</a></li>
              <li><a class="dropdown-item" href="{{ route('pasien.riwayat.index') }}">Riwayat Periksa</a></li>
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
        <a href="{{ route('register') }}" class="btn btn-primary shadow-sm mx-2">Registrasi</a>
        <a href="{{ route('login') }}" class="btn btn-warning shadow-sm">Login</a>
      @endif
    </div>
  </div>
</header>
@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('section[id]');

    window.addEventListener('scroll', () => {
      let current = '';
      sections.forEach((section) => {
        const sectionTop = section.offsetTop - 100;
        const sectionHeight = section.offsetHeight;
        if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
          current = section.getAttribute('id');
        }
      });

      navLinks.forEach((link) => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
          link.classList.add('active');
        }
      });
    });
  });
</script>
@endpush

