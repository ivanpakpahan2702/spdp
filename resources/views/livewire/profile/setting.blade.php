<main id="main" class="main">
  <style>
    input[type="file"] {
      color: transparent;
      display: none;
    }

    .foto_profil_btn,
    .hps_foto_profil_btn {
      cursor: pointer;
    }

    .foto_profil_btn i {
      color: snow;
    }

    .hps_foto_profil_btn i {
      color: snow;
    }
  </style>
  <div>
    <div class="pagetitle pb-5">
      <h1>Akun Pengguna</h1>
    </div>
    <!-- End Page Title -->
    <div class="card p-4">
      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src='{{ asset('assets/Images/profil/' . auth()->user()->foto_profil) }}' alt="Profile"
                  class="rounded-circle">
                <h2>{{ auth()->user()->nama }}</h2>
                <h3>{{ auth()->user()->jabatan ?? 'Jabatan belum diisi' }}</h3>
                <div class="social-links mt-2">
                  <a href="{{ auth()->user()->twitter ?? '#' }}" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="{{ auth()->user()->facebook ?? '#' }}" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="{{ auth()->user()->insta ?? '#' }}" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="{{ auth()->user()->linkedin ?? '#' }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8">
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">
                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab"
                      data-bs-target="#profile-overview">Profil</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profil</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ganti
                      Password</button>
                  </li>
                </ul>
                <div class="tab-content pt-2">
                  <!-- ================================== Profile Form ==================================== -->
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">Deskripsi</h5>
                    <p class="small fst-italic">{{ auth()->user()->deskripsi ?? 'Data tidak tersedia.' }}</p>
                    <h5 class="card-title">Detail</h5>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                      <div class="col-lg-9 col-md-8">{{ auth()->user()->nama ?? 'Data tidak tersedia.' }}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Email</div>
                      <div class="col-lg-9 col-md-8">{{ auth()->user()->email ?? 'Data tidak tersedia.' }}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">NIP</div>
                      <div class="col-lg-9 col-md-8">{{ auth()->user()->nip ?? 'Data tidak tersedia.' }}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Jabatan</div>
                      <div class="col-lg-9 col-md-8">{{ auth()->user()->jabatan ?? 'Data tidak tersedia.' }}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Tempat Lahir</div>
                      <div class="col-lg-9 col-md-8">{{ auth()->user()->tempat_lahir ?? 'Data tidak tersedia.' }}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                      <div class="col-lg-9 col-md-8">{{ auth()->user()->tanggal_lahir ?? 'Data tidak tersedia.' }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nomor Ponsel</div>
                      <div class="col-lg-9 col-md-8">{{ auth()->user()->no_hp ?? 'Data tidak tersedia.' }}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                      <div class="col-lg-9 col-md-8">{{ auth()->user()->jenis_kelamin ?? 'Data tidak tersedia.' }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Agama</div>
                      <div class="col-lg-9 col-md-8">{{ auth()->user()->agama ?? 'Data tidak tersedia.' }}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Alamat</div>
                      <div class="col-lg-9 col-md-8">{{ auth()->user()->alamat ?? 'Data tidak tersedia.' }}</div>
                    </div>
                  </div>
                  <!-- ================================== Profile Edit Form ==================================== -->
                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                    <form>
                      <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                        <div class="col-md-8 col-lg-9">
                          <img src='{{ asset('assets/Images/profil/' . auth()->user()->foto_profil) }}'
                            id='foto_profil_preview' alt="Profile">
                          <div class="pt-2">
                            <label for="foto_profil" class="foto_profil_btn bg-primary p-2 rounded"
                              title="Upload Foto"><i class="bi bi-upload" id="upload-image"></i></label>
                            <input type="file" id="foto_profil" name="foto_profil">
                            <label class="hps_foto_profil_btn bg-danger p-2 rounded" id="delete-image"
                              title="Hapus Foto"><i class="bi bi-trash"></i></label>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="fullName" type="text" class="form-control" id="fullName"
                            value="Kevin Anderson">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                        <div class="col-md-8 col-lg-9">
                          <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="company" type="text" class="form-control" id="company"
                            value="Lueilwitz, Wisoky and Leuschke">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="job" type="text" class="form-control" id="Job"
                            value="Web Designer">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="country" type="text" class="form-control" id="Country" value="USA">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="address" type="text" class="form-control" id="Address"
                            value="A108 Adam Street, New York, NY 535022">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="phone" type="text" class="form-control" id="Phone"
                            value="(436) 486-3538 x29071">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="email" class="form-control" id="Email"
                            value="k.anderson@example.com">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="twitter" type="text" class="form-control" id="Twitter"
                            value="https://twitter.com/#">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="facebook" type="text" class="form-control" id="Facebook"
                            value="https://facebook.com/#">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="instagram" type="text" class="form-control" id="Instagram"
                            value="https://instagram.com/#">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="linkedin" type="text" class="form-control" id="Linkedin"
                            value="https://linkedin.com/#">
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->
                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form>
                      <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                          Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->
                  </div>
                </div><!-- End Bordered Tabs -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <script>
    const fileInput = document.getElementById('foto_profil');
    const imagePreview = document.getElementById('foto_profil_preview');
    const deleteButton = document.getElementById('delete-image');


    fileInput.addEventListener('change', function() {
      const file = fileInput.files[0];
      const reader = new FileReader();

      reader.addEventListener('load', function() {
        imagePreview.src = reader.result;
      });

      if (file) {
        reader.readAsDataURL(file);
      }
    });

    deleteButton.addEventListener('click', function() {
      imagePreview.src = "";
      fileInput.value = null;
    });
  </script>
</main>
