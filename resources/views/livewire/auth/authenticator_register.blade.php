<!DOCTYPE html>
<html lang="id">

<head>
  <title>Register || SPDP PN-TAIS</title>
  @include('components.partials.head')
  @livewireStyles
</head>

<body>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('assets/Images/logo/logo1.png') }}" alt="Logo">
                  <span class="d-none d-lg-block">SPDP PN-TAIS</span>
                </a>
              </div>
              <!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Daftar Akun</h5>
                    <p class="text-center small">Isi Semua Kolom Isian Sesuai Dengan Data Anda </p>
                  </div>
                  <form class="row g-3" method="POST" action="/register">
                    @csrf
                    <div class="col-12">
                      <label for="yourName" class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        id="yourName" value="{{ old('nama') }}">
                      @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="yourEmail" value="{{ old('email') }}">
                      @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username"
                          class="form-control @error('username') is-invalid @enderror" id="yourUsername"
                          value="{{ old('username') }}">
                        @error('username')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" id="yourPassword">
                      @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms"
                          required>
                        <label class="form-check-label" for="acceptTerms">Saya menyetujui <a href="#">Syarat dan
                            Kebijakan Privasi</a> yang digunakan aplikasi</label>
                        <div class="invalid-feedback">Wajib Dicek</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Daftar Akun</button>
                    </div>
                  </form>
                  <div class="col-12">
                    <p class="small mb-0">Sudah Punya Akun? <a href="/login" wire:navigate>Log in</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  @include('components.partials.foot')
  @livewireScripts
</body>

</html>
