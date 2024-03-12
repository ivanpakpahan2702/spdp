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
          <h4 class="mb-2">Form Setel Ulang Password 🔒</h4>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div id="formAuthentication" class="mb-3">
                <input type="hidden" name="token" id="token" value="{{ $token }}">
                <input type="hidden" name="email" id="email" value="{{ $email }}">
                <div class="mb-3 form-password-toggle mt-5">
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password"
                      placeholder="Masukkan Kata Sandi Baru" aria-describedby="password" />
                  </div>
                </div>
                <button id="reset" class="btn btn-primary">
                  <div id="loader" class="spinner-border spinner-border-sm" role="status" style="display: none">
                    <span class="visually-hidden"></span>
                  </div> Reset Password
                </button>
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>
          <div class="text-center">
            <a href="/login_forced" wire:navigate class="d-flex align-items-center justify-vcontent-center">
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
      $("#reset").click(function() {
        var data = {
          'token': $('#token').val(),
          'email': $('#email').val(),
          'password': $('#password').val(),
        };
        $('#password').val('');
        $.ajax({
          url: '/reset-password',
          type: 'POST',
          data: data,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: 'json',
          beforeSend: function() {
            $('#reset').prop('disabled', true);
            $('#loader').show();
          },
          success: function(response) {
            $('#reset').prop('disabled', false);
            $('#loader').hide();
            var data_parsed = JSON.parse(response.message);
            let html_error = '';
            Object.keys(data_parsed).forEach(key => {
              const value = data_parsed[key];
              html_error += `- ${key} : ${value}` + '<br>';
            });
            if (response.type == 'success') {
              html_error = html_error +
                '<br><br><br><h3>Silahkan Login Kembali Dengan Password Baru Anda</h3><br><h3><a href="/login_forced" wire:navigate>Login</a>'
            }
            Swal.fire({
              position: "center",
              icon: response.type,
              title: 'Notifikasi',
              html: html_error,
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
