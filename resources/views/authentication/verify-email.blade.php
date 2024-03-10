<!doctype html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>SPDP PN TAIS || Verifikasi EMail</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
    integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
</head>

<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="/" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <img src='' alt="Logo" width="35">
                </span>
                <span class="app-brand-text demo text-body fw-bold">ptsp</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Selamat datang di layanan SPDP PN Tais</h4>
            <p class="mb-4">Silahkan melakukan verifikasi dengan email yang telah anda daftarkan</p>
            <p class="mb-4">Tidak mendapatkan link? atau link telah expired? silahkan meminta pengiriman ulang
            </p>
            @if (session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <form action="/email/verification-notification" method="POST">
              @csrf
              <button class="btn btn-success" type="submit">Kirim Ulang</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'
    integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>
</body>

</html>
