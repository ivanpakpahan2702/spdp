<header id="header" class="header fixed-top d-flex align-items-center">
  <!-- Start Logo -->
  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="{{ asset('assets/Images/logo/logo1.png') }}" alt="Logo">
      <span class="d-none d-lg-block">SPDP PN-TAIS</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>
  <!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <!-- Start Notification Nav -->
      <li class="nav-item dropdown">
        <!-- Start Notification Icon -->
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary badge-number">99+</span>
        </a>
        <!-- End Notification Icon -->
        <!-- Start Notification Dropdown Items -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications word-break">
          <li class="dropdown-header">
            <div>99+ Notifikasi Baru</div>
            <a href="#" class="badge rounded-pill bg-primary"><i class="bi bi-eye-fill">&nbsp;Lihat</i>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
            <hr class="dropdown-divider">
          </li>
          <li class="notification-item">
            <div>
              <strong class="blink-soft">Terbaru</strong>
              <div class="mt-3">
                <h4>Pandesar Pakpahan</h4>
                <p>Pak Izin Cuti, Surat Terlampir</p>
                <small>1 menit yang lalu</small>
                <br>
                <a href="#"><i class="bi bi-box-arrow-up-right"></i></a>
              </div>
            </div>
          </li>
        </ul>
        <!-- End Notification Dropdown Items -->
      </li>
      <!-- End Notification Nav -->

      <!-- Start Profile Nav -->
      <li class="nav-item dropdown pe-3">
        <!-- Start Profile Image Icon -->
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src='{{ asset('assets/Images/profil/' . auth()->user()->foto_profil) }}' alt="Profile"
            class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->nama }}</span>
        </a>
        <!-- End Profile Image Icon -->
        <!-- Start Profile Dropdown Items -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{ auth()->user()->nama }}</h6>
            <span>{{ auth()->user()->jabatan ?? 'Jabatan belum diisi' }}</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="/pengaturan-akun" wire:navigate>
              <i class="bi bi-gear"></i>
              <span>Pengaturan Akun</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
              <i class="bi bi-question-circle"></i>
              <span>Petunjuk</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <livewire:auth.logout />
          </li>
        </ul>
        <!-- End Profile Dropdown Items -->
      </li>
      <!-- End Profile Nav -->

    </ul>
  </nav>
  <!-- End Icons Navigation -->
</header>
