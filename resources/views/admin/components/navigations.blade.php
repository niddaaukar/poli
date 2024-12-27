<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
<div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="{{ asset('img/logo-poli.png') }}" alt="Logo Poliklinik" style="height: 40px; width: auto; border-radius: 8px;">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Poli - UDN</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
</div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
            <li class="menu-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
              <a href="{{ route('admin.dashboard') }}" class="menu-link">
              <div style="display: flex; align-items: center; gap: 8px;">
              <i class="fa-solid fa-house"></i>
                    <div>Dashboard</div>
                </div>
              </a>
            </li>
            <!-- Dokter -->
            <li class="menu-item ">
            <li class="menu-item {{ Request::routeIs('admin.dokter.*') ? 'active' : '' }}">
              <a href="{{ route('admin.dokter.index') }}" class="menu-link">
              <div style="display: flex; align-items: center; gap: 8px;">
              <i class="fa-solid fa-user-doctor"></i>
                    <div>Dokter</div>
                </div>
              </a>
            </li>
              <!-- Pasien -->
              <li class="menu-item">
              <li class="menu-item {{ Request::routeIs('admin.pasien.*') ? 'active' : '' }}">
                  <a href="{{ route('admin.pasien.index') }}" class="menu-link">
                  <div style="display: flex; align-items: center; gap: 8px;">
                  <i class="fa-solid fa-user-group"></i>
                    <div>Pasien</div>
                </div>
                  </a>
              </li>
            <!-- End Pasien -->
             <!-- Obat -->
            <li class="menu-item">
            <li class="menu-item {{ Request::routeIs('admin.obat.*') ? 'active' : '' }}">
            <a href="{{ route('admin.obat.index') }}" class="menu-link">
            <div style="display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-pills"></i>
                    <div>Obat</div>
                </div>
              </a>
            </li>
            <!-- End obat -->
              <!-- Poli -->
            <li class="menu-item">
            <li class="menu-item {{ Request::routeIs('admin.poli.*') ? 'active' : '' }}">
            <a href="{{ route('admin.poli.index') }}" class="menu-link">
            <div style="display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-hospital"></i>
                    <div>Poli</div>
                </div>
              </a>
            </li>
            <!-- End Poli -->
             <!-- Manajemen Header -->
        <li class="menu-header text-uppercase small text-muted">
            <span class="menu-header-text">Manajemen</span>
        </li>
        <!-- Profil -->
        <li class="menu-item {{ Request::routeIs('admin.profil.index') ? 'active' : '' }}">
            <a href="{{ route('admin.profil.index') }}" class="menu-link">
                <div style="display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-user"></i>
                    <div>Profil</div>
                </div>
            </a>
        </li>
        <!-- Logout -->
        <li class="menu-item">
            <a href="{{ route('logout') }}" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form-1').submit();">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <div>Logout</div>
                </div>
            </a>
            <form id="logout-form-1" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</aside>
