<!doctype html>
<html lang='en'>

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SPDP PN TAIS || Verifikasi EMail</title>


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

  @include('components.partials.head')
  @livewireStyles
</head>

<body class="font-outfit">
  <style>
    body {
      background-color: rgba(151, 147, 147, 0.829);
    }

    .font-outfit {
      font-family: "Outfit", sans-serif;
      font-optical-sizing: auto;
      font-weight: 400;
      font-style: normal;
    }
  </style>
  <div class="container-sm mt-5 text-center">
    <div class="card shadow pt-5">
      <div class="card-body pb-5">
        <!-- Logo -->
        <div class="justify-content-center mb-5">
          <a href="#" class="gap-2" style="text-decoration: none">
            <span class="demo">
              <img src='{{ asset('assets/Images/logo/logo1.png') }}' alt="Logo" width="35">
            </span>
            <h1 class="text-body fw-bold">SPDP</h1>
          </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-2">Selamat datang di layanan SPDP PN Tais</h4>
        <p class="mb-4">Silahkan melakukan verifikasi dengan email yang telah anda daftarkan</p>
        <p class="mb-4">Tidak mendapatkan link? atau link telah kedaluwarsa? silahkan meminta pengiriman ulang
        </p>
        @if (session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <button class="btn btn-success" id="resend-email">
          <div id="loader" class="spinner-border spinner-border-sm" role="status" style="display: none">
            <span class="visually-hidden"></span>
          </div> Kirim Ulang
        </button>
        <a href="/login_forced" class="d-block mt-5" style="text-decoration: none" wire:navigate>Ke Halaman Login</a>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $("#resend-email").click(function() {
        $.ajax({
          url: '/email/verification-notification',
          type: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: 'json',
          beforeSend: function() {
            $('#resend-email').prop('disabled', true);
            $('#loader').show();
          },
          success: function(response) {
            $('#resend-email').prop('disabled', false);
            $('#loader').hide();
            Swal.fire({
              position: "center",
              icon: "success",
              title: response.message,
              showConfirmButton: true,
            });
          }
        });
      });
    });
  </script>
  <!-- ======= Foot JS Link ======= -->
  @include('components.partials.foot')
  <!-- End Foot JS -->
  @livewireScripts
</body>

</html>
