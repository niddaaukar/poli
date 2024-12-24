<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Poliklinik Udinus</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('css/frontend/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('css/frontend/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{asset('css/frontend/aos.css') }}" rel="stylesheet">
  <link href="{{asset('css/frontend/glightbox.min.css') }}"rel="stylesheet">
  <link href="{{asset('css/frontend/swiper-bundle.min.css') }} "rel="stylesheet">
  
  <!-- Main CSS File -->
  <link href="{{asset('css/frontend/main.css') }} " rel="stylesheet">
  @stack('styles')
</head>
<body>
    @yield('content')
    @include('components.sweetalert')
    <script src="{{asset('js/main/bootstrap.bundle.min.js') }} "></script>
  <script src="{{asset('js/main/validate.js') }} "></script>
  <script src="{{asset('js/main/aos.js') }} "></script>
  <script src="{{asset('js/main/glightbox.min.js') }} "></script>
  <script src="{{asset('js/main/swiper-bundle.min.js') }} "></script>
  <script src="{{asset('js/main/purecounter_vanilla.js') }} "></script>
  <script src="{{asset('js/main/fontawesome.js') }} "></script>
  <script src="{{asset('js/main/javascript.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{asset('js/main/main.js') }} "></script>
 @stack('scripts')
</body>
</html>