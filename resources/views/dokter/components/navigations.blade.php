<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Poliklinik</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ Request::routeIs('dokter.dashboard') ? 'active' : '' }}">
              <a href="{{ route('dokter.dashboard') }}" class="menu-link">
              <div style="display: flex; align-items: center; gap: 8px;">
              <i class="fa-solid fa-house-medical"></i>
                  <div>Dashboard</div>
              </div>
              </a>
            </li>
            <!-- Dokter -->
            <li class="menu-item ">
            <li class="menu-item {{ Request::routeIs('dokter.periksa.*') ? 'active' : '' }}">
              <a href="{{ route('dokter.periksa.index') }}" class="menu-link">
              <div style="display: flex; align-items: center; gap: 8px;">
              <i class="fa-solid fa-stethoscope"></i>
                  <div>Periksa</div>
              </div>
              </a>
            </li>
              <!-- Jadwal Periksa -->
              <li class="menu-item">
              <li class="menu-item {{ Request::routeIs('dokter.jadwal_periksa.*') ? 'active' : '' }}">
                  <a href="{{ route('dokter.jadwal_periksa.index') }}" class="menu-link">
                  <div style="display: flex; align-items: center; gap: 8px;">
                  <i class="fa-solid fa-briefcase-medical"></i>
                        <div>Jadwal Periksa</div>
                    </div>
                  </a>
              </li>
            <!-- Jadwal Periksa -->
             <!-- Jadwal Periksa -->
             <li class="menu-item">
              <li class="menu-item {{ Request::routeIs('dokter.riwayat_pasien.index.*') ? 'active' : '' }}">
                  <a href="{{ route('dokter.riwayat_pasien.index') }}" class="menu-link">
                  <div style="display: flex; align-items: center; gap: 8px;">
                  <i class="fa-solid fa-briefcase-medical"></i>
                        <div>Riwayat Periksa</div>
                    </div>
                  </a>
              </li>
            <!-- Jadwal Periksa -->
            <!-- Pengaturan -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Manajemen</span></li>
            <li class="menu-item">
            <a href="{{ route('dokter.profil.index') }}" class="menu-link">
            <div style="display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-user-doctor"></i>
                  <div>Profil</div>
              </div>
              </a>
            </li>
                    <li>
                    <a href="{{ route('logout') }}" class="dropdown-item border-radius-md"
                                onclick="event.preventDefault(); document.getElementById('logout-form-1').submit();">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                  <div>Logout</div>
                                </div>
                            </a>
                            <form id="logout-form-1" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                    </li>
          </ul>
        </aside>
        <!-- / Menu -->