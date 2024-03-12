<!doctype html>
<html lang='en'>

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SPDP PN TAIS || Lupa Password</title>


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
    <!-- Forgot Password -->
    <div class="card shadow pt-5">
      <div class="card-body">
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
        <div class="ps-5 pe-5">
          <h4 class="mb-2">Lupa Password? 🔒</h4>
          <p class="mb-4">Masukkan email anda yang telah terdaftar, agar kami dapat mengirimkan
            instruksi selanjutnya</p>
          <div>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <div id="formAuthentication" class="mb-3">
                  <div class="mb-3">
                    <input type="text" class="form-control" id="email" name="email"
                      placeholder="Masukkan email" autofocus />
                  </div>
                  <button class="btn btn-primary" id="send-reset">
                    <div id="loader" class="spinner-border spinner-border-sm" role="status" style="display: none">
                      <span class="visually-hidden">Loading...</span>
                    </div> Reset Password
                  </button>
                </div>
              </div>
              <div class="col-md-4"></div>
            </div>
          </div>
          <div class="text-center">
            <a href="/login" wire:navigate class="d-flex align-items-center justify-vcontent-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              Kembali ke halaman login
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- /Forgot Password -->
  </div>
  <script>
    $(document).ready(function() {
      $("#send-reset").click(function() {
        var data = {
          'email': $('#email').val(),
        };
        $.ajax({
          url: '/forgot-password',
          type: 'POST',
          data: data,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: 'json',
          beforeSend: function() {
            $('#send-reset').prop('disabled', true);
            $('#loader').show();
          },
          success: function(response) {
            $('#send-reset').prop('disabled', false);
            $('#loader').hide();
            var data_parsed = JSON.parse(response.message);
            Swal.fire({
              position: "center",
              icon: response.type,
              title: 'Notifikasi',
              html: data_parsed.email,
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
