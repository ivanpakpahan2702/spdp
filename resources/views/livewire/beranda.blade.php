<main id="main" class="main">
  <div>
    <div class="pagetitle pb-5">
      <h1>Beranda</h1>
    </div>
    <!-- End Page Title -->
    <div class="card p-4">
      @if (session('Success-Register'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Hello !</strong> {{ session('Success-Register') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <h4>SPDP PN-TAIS (SISTEM PENGELOLAAN DATA PEGAWAI)</h4>
    </div>
  </div>
</main>
