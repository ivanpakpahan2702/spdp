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
            </div><!-- End Logo -->
            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                  <p class="text-center small">Masukkan Email & Password</p>
                </div>
                @error('login_error')
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @enderror
                <form class="row g-3" wire:submit.prevent="login">
                  <div class="col-12">
                    <label for="yourEmail" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="yourEmail" value="{{ old('email') }}" wire:model="email">
                      @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                      id="yourPassword" wire:model="password">
                    @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-12 text-end">
                    <a href="/forgot-password" style="font-size: 12px" wire:navigate>lupa password</a>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="rememberMe"
                        wire:model="remember_me">
                      <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">
                      <div wire:loading class="me-2">
                        <img src="{{ asset('assets/Images/svg/dot-revolve.svg') }}" alt="loader">
                      </div>
                      Login
                    </button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Belum Punya Akun? <a href="/register" wire:navigate>Daftar Akun</a>
                    </p>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script data-navigate-once>
    document.addEventListener("livewire:init", () => {
      Livewire.on("alert", (event) => {
        Swal.fire({
          position: event.position,
          icon: event.type,
          title: event.title,
          showConfirmButton: false,
          timer: 1500
        });
      });
    });
  </script>
</main>
