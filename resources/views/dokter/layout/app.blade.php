<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('css/admin/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/admin/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    
    <link rel="stylesheet" href="{{ asset('css/admin/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->
     @stack('styles')

    <!-- Helpers -->
    <script src="{{ asset('js/admin/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('js/admin/config.js') }}"></script>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
         @include('dokter.components.navigations')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            @include('dokter.components.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
                @yield('content')
            <!-- / Content -->

            <!-- Footer -->
                @include('dokter.components.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    @include('components.sweetalert')
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    
    <script src="{{ asset('js/main/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/admin/popper.js') }}"></script>
    <script src="{{asset('js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('js/admin/perfect-scrollbar.js') }}"></script>
    <script src="{{asset('js/main/sweetalert2@11.js') }}"></script>
    <script src="{{asset('js/main/javascript.js') }}"></script>
    <script src="{{asset('js/main/fontawesome.js') }} "></script>
    <script src="{{asset('js/admin/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
     
    <script src="{{asset('js/admin/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{asset('js/admin/main.js') }}"></script>

@stack('scripts')
    <!-- Page JS -->
    <script src="{{asset('js/admin/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

