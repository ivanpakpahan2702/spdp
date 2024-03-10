<!DOCTYPE html>
<html lang="id">

<head>
  <title>{{ $title }} - SPDP PN-TAIS</title>
  <!-- ==== Head Link ==== -->
  @include('components.partials.head')
  <!-- ==== End Head Link ==== -->
</head>

<body>

  @if ($title == 'Login')
  @elseif($title == 'Register')
  @else
    <!-- ======= Header ======= -->
    @include('components.partials.header')
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    @include('components.partials.sidebar')
    <!-- End Sidebar-->
  @endif

  {{ $slot }}
  <!-- End #main -->

  @if ($title == 'Login')
  @elseif($title == 'Register')
  @else
    <!-- ======= Footer ======= -->
    @include('components.partials.footer')
    <!-- End Footer -->
  @endif

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- ======= Foot JS Link ======= -->
  @include('components.partials.foot')
  <!-- End Foot JS -->

</body>

</html>
