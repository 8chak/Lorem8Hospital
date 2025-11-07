<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>{{ config('app.name', 'Lorem') }} - Medical Center </title>

  <link rel="stylesheet" href="{{ asset('template') }}/assets/css/maicons.css">

  <link rel="stylesheet" href="{{ asset('template') }}/assets/css/bootstrap.css">

  <link rel="stylesheet" href="{{ asset('template') }}/assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="{{ asset('template') }}/assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="{{ asset('template') }}/assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <!-- .topbar -->
    @include('x_page_section.topbar')
    
    @include('x_page_section.navbar')
  </header>

  @yield('content')
  
  <!-- Hero section -->

  <!-- doctors section -->

  @include('x_page_section.footer')

<script src="{{ asset('template') }}/assets/js/jquery-3.5.1.min.js"></script>

<script src="{{ asset('template') }}/assets/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('template') }}/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="{{ asset('template') }}/assets/vendor/wow/wow.min.js"></script>

<script src="{{ asset('template') }}/assets/js/theme.js"></script>
  
</body>
</html>