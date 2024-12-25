<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    @stack('title')
    <meta name="description" content="" />

    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    @if(Request::is('admin/*') || Request::is('dokter/*'))
      <!-- Core CSS -->
      <link rel="stylesheet" href="{{ asset('css/core/core.css') }}" class="template-customizer-core-css" />
      <link rel="stylesheet" href="{{ asset('css/core/theme-default.css') }}" class="template-customizer-theme-css" />
      <link rel="stylesheet" href="{{ asset('css/core/demo.css') }}" />

      <!-- Vendors CSS -->
      <link rel="stylesheet" href="{{ asset('css/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/libs/apex-charts/apex-charts.css') }}" />

      <!-- Helpers -->
      <script src="{{ asset('js/vendor/helpers.js') }}"></script>

      <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
      <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
      <script src="{{ asset('js/admin/config.js') }}"></script>
    @else
      <!-- Vendor CSS Files -->
      <link href="{{asset('css/frontend/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{asset('css/frontend/bootstrap-icons.css') }}" rel="stylesheet">
      <link href="{{asset('css/frontend/aos.css') }}" rel="stylesheet">
      <link href="{{asset('css/frontend/glightbox.min.css') }}"rel="stylesheet">
      <link href="{{asset('css/frontend/swiper-bundle.min.css') }} "rel="stylesheet">
      

      <!-- Main CSS File -->
      <link href="{{asset('css/frontend/main.css') }} " rel="stylesheet">
    @endif

    <!-- Page CSS -->
    @stack('styles')



  </head>

  <body>
    
    @if(Request::is('admin/*'))
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
      <!-- Menu -->
      @include('admin.components.navigations')
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
      

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
              @yield('content')
          <!-- / Content -->

          <!-- Footer -->
              @include('admin.components.footer')
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
      @elseif(Request::is('dokter/*'))
      <!-- Layout wrapper -->
      <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
        <!-- Menu -->
        @include('dokter.components.navigations')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
         

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
         <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
      </div>
      <!-- / Layout page -->
      @else
        @yield('content')
      @endif
      </div>

      
    @include('components.sweetalert')
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->    
    
    <!-- Vendors JS -->
    <script src="{{ asset('js/main/javascript.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('js/vendor/fontawesome.js') }} "></script>
    
    
    <!-- Custom JS-->
    <script src="{{asset('js/main/javascript.js') }}"></script>   
    
    @if(Request::is('admin/*') || Request::is('dokter/*'))
      <!-- Main JS -->
      <script src="{{asset('js/dashboard/main.js') }}"></script>
      
      <!-- Vendors JS -->
      <script src="{{asset('js/vendor/apexcharts.js') }}"></script>
      <script src="{{ asset('js/vendor/menu.js') }}"></script>
      <script src="{{ asset('js/vendor/popper.js') }}"></script>
      <script src="{{ asset('js/vendor/perfect-scrollbar.js') }}"></script>

      <!-- Page JS -->
      <script src="{{asset('js/dashboard/dashboards-analytics.js') }}"></script>
    @else
      <!-- Main JS -->
      <script src="{{asset('js/main/aos.js') }} "></script>
      <script src="{{asset('js/main/glightbox.min.js') }} "></script>
      <script src="{{asset('js/main/javascript.js') }}"></script>
      <script src="{{asset('js/main/main.js') }} "></script>
      <script src="{{asset('js/main/purecounter_vanilla.js') }} "></script>
      <script src="{{asset('js/main/swiper-bundle.min.js') }} "></script>
      <script src="{{asset('js/main/validate.js') }} "></script>
    @endif

    @stack('scripts')

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

