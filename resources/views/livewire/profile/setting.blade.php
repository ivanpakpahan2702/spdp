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
                      <div class="col-lg-9 col-md-8">
                        {{ auth()->user()->tanggal_lahir === null ? 'Data tidak tersedia.' : date('d-m-Y', strtotime(auth()->user()->tanggal_lahir)) }}
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
                        <label for="deskripsi" class="col-md-4 col-lg-3 col-form-label">Deskripsi</label>
                        <div class="col-md-8 col-lg-9">
                          <textarea wire:model="deskripsi" name="deskripsi" class="form-control" id="deskripsi" style="height: 100px">{{ old('deskripsi') ?? auth()->user()->deskripsi }}</textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="nama" type="text"
                            class="form-control  @error('nama') is-invalid @enderror" id="nama"
                            value="{{ old('nama') ?? auth()->user()->nama }}" wire:model="nama">
                          @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" id="email"
                            value="{{ old('email') ?? auth()->user()->email }}" wire:model="email">
                          @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="nip" type="text" class="form-control" id="nip"
                            value="{{ old('nip') ?? auth()->user()->nip }}" wire:model="nip">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="jabatan" class="col-md-4 col-lg-3 col-form-label">Jabatan</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="jabatan" type="text" class="form-control" id="jabatan"
                            value="{{ old('jabatan') ?? auth()->user()->jabatan }}" wire:model="jabatan">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="tempat_lahir" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir"
                            value="{{ old('tempat_lahir') ?? auth()->user()->tempat_lahir }}"
                            wire:model="tempat_lahir">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir"
                            value="{{ old('tanggal_lahir') ?? auth()->user()->tanggal_lahir }}"
                            wire:model="tanggal_lahir">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="no_hp" class="col-md-4 col-lg-3 col-form-label">Nomor Ponsel</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="no_hp" type="text" class="form-control" id="no_hp"
                            value="{{ old('no_hp') ?? auth()->user()->no_hp }}" wire:model="nomor_hp">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-select"
                            aria-label="Default select example" wire:model="jenis_kelamin">
                            <option value="">--Pilih Gender--</option>
                            <option value="Pria" {{ auth()->user()->jenis_kelamin == 'Pria' ? 'Selected' : '' }}>
                              Pria
                            </option>
                            <option value="Wanita" {{ auth()->user()->jenis_kelamin == 'Wanita' ? 'Selected' : '' }}>
                              Wanita
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="agama" class="col-md-4 col-lg-3 col-form-label">Agama</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="agama" id="agama" class="form-select"
                            aria-label="Default select example" wire:model="agama">
                            <option value="">--Pilih Kepercayaan--</option>
                            <option value="Islam" {{ auth()->user()->agama == 'Islam' ? 'Selected' : '' }}>
                              Islam
                            </option>
                            <option value="Kristen Protestan"
                              {{ auth()->user()->agama == 'Kristen Protestan' ? 'Selected' : '' }}>
                              Kristen Protestan
                            </option>
                            <option value="Kristen Katolik"
                              {{ auth()->user()->agama == 'Kristen Katolik' ? 'Selected' : '' }}>
                              Kristen Katolik
                            </option>
                            <option value="Hindu" {{ auth()->user()->agama == 'Hindu' ? 'Selected' : '' }}>
                              Hindu
                            </option>
                            <option value="Buddha" {{ auth()->user()->agama == 'Buddha' ? 'Selected' : '' }}>
                              Buddha
                            </option>
                            <option value="Konghucu" {{ auth()->user()->agama == 'Konghucu' ? 'Selected' : '' }}>
                              Konghucu
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                        <div class="col-md-8 col-lg-9">
                          <textarea wire:model="alamat" name="alamat" class="form-control" id="alamat" style="height: 100px">{{ old('alamat') ?? auth()->user()->alamat }}</textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Link Twitter</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="twitter" type="text" class="form-control" id="Twitter"
                            value="{{ old('twitter') ?? auth()->user()->twitter }}" wire:model='twitter'>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Link Facebook</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="facebook" type="text" class="form-control" id="Facebook"
                            value="{{ old('facebook') ?? auth()->user()->facebook }}" wire:model='facebook'>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Link Instagram</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="insta" type="text" class="form-control" id="Instagram"
                            value="{{ old('insta') ?? auth()->user()->insta }}" wire:model='insta'>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Link Linkedin</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="linkedin" type="text" class="form-control" id="Linkedin"
                            value="{{ old('linkedin') ?? auth()->user()->linkedin }}" wire:model='linkedin'>
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                    </form>
                    <!-- End Profile Edit Form -->
                  </div>
                  <!-- ============================= Change Password Form ====================================== -->
                  <div class="tab-pane fade pt-3" id="profile-change-password">

                    <form>
                      <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Saat
                          Ini</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Masukkan Password Baru
                          Sekali Lagi</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                      </div>
                    </form>
                    <!-- End Change Password Form -->
                  </div>
                </div>
                <!-- End Bordered Tabs -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <script data-navigate-once>
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
      imagePreview.src = "{{ asset('assets/Images/profil/' . auth()->user()->foto_profil) }}";
      fileInput.value = null;
    });
  </script>
  <script data-navigate-once>
    var nameInput = document.getElementById('email');

    function toggleFocusClass() {
      nameInput.classList.toggle('focused');
    }
    nameInput.addEventListener('focus', toggleFocusClass);
    nameInput.addEventListener('blur', toggleFocusClass);
  </script>
</main>
