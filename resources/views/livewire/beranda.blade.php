<main id="main" class="main">
  <div>
    <div class="pagetitle pb-5">
      <h1>Beranda</h1>
    </div>
    <!-- End Page Title -->
    <div class="card p-4">
      @if (session('success-verify'))
        <script>
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Notifikasi',
            text: 'Selamat datang {{ auth()->user()->nama }}, Anda berhasil melakukan verifikasi',
            showConfirmButton: true,
          });
        </script>
      @endif
      <h4>SPDP PN-TAIS (SISTEM PENGELOLAAN DATA PEGAWAI)</h4>
    </div>
  </div>
</main>
