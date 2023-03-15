@extends('layouts.app', ['active' => 'Dashboard'])
@section('title', 'Arsmedika - Asuransi Kesehatan')
@section('style')
    <!-- Masukkan Style Css tambahan disini -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
      .p-viewer {
          float: right;
          margin-top: -30px;
          margin-right: 10px;
          position: relative;
          z-index: 1;
          cursor:pointer;
      }
    </style>
    <!-- / Masukkan Style Css tambahan disini -->
@endsection

@section('content')
    <!-- Content -->
    
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile /</span> Ganti Password</h4>

    <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('Dashboard') }}"
                  ><i class="bx bx-bell me-1"></i> Dashboard</a
                >
              </li>
            <li class="nav-item">
              <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Password</a>
            </li>
          </ul>
          <div class="card mb-4">
            <h5 class="card-header">Form Ganti Password</h5>
            <!-- Account -->
            <hr class="my-0" />
            <div class="card-body">
              @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  Proses ganti password sukses.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  Proses ganti password gagal.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <form method="POST" action="{{ route('Ganti Password') }}">
                @csrf
                <div class="row">
                  <div class="mb-3 col-md-12">
                    <label for="old_password" class="form-label">Password Lama</label>
                    <input type="password" 
                      class="form-control @error('old_password') is-invalid @enderror"
                      name="old_password"
                      id="old_password"
                      placeholder="Masukkan Password Lama Anda"
                      aria-describedby="password" 
                      autofocus 
                      value="{{ old('old_password') }}"
                      autocomplete="old_password" 
                      required>
                    <span class="p-viewer">
                      <i class="bi bi-eye-slash" id="toggleOldPassword" aria-hidden="true"></i>
                    </span>
                  </div>

                  <div class="mb-3 col-md-12">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" 
                      name="password"
                      class="form-control @error('password') is-invalid @enderror"
                      id="password"
                      placeholder="Ketik Password Baru Anda"
                      aria-describedby="password" 
                      autofocus 
                      value="{{ old('password') }}"
                      autocomplete="password" 
                      required>
                      <span class="p-viewer">
                          <i class="bi bi-eye-slash" id="togglePassword" aria-hidden="true"></i>
                      </span>
                  </div>

                  <div class="mb-3 col-md-12">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password"
                      name="password_confirmation"
                      class="form-control"
                      id="password_confirmation"
                      placeholder="Ketik Ulang Konfirmasi Password Baru"
                      value="{{ old('password_confirmation') }}"
                      autocomplete="password_confirmation"
                      autofocus
                      required>
                    <span class="p-viewer">
                      <i class="bi bi-eye-slash" id="toggleConfirmPassword" aria-hidden="true"></i>
                  </span>
                  </div>
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Simpan</button>
                  <button type="reset" class="btn btn-outline-secondary">Kembali</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
        </div>
      </div>
    
    
@endsection
    <!-- / Content -->

@push('script')
    <!-- Masukkan Script tambahan disini -->
    <script src="{{ asset('theme/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        const toggleOldPassword = document.querySelector("#toggleOldPassword");
        const oldPassword = document.querySelector("#old_password");

        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
        const confirmPassword = document.querySelector("#password_confirmation");

        toggleOldPassword.addEventListener("click", function () {
            const type = oldPassword.getAttribute("type") === "password" ? "text" : "password";
            oldPassword.setAttribute("type", type);
            this.classList.toggle("bi-eye");
        });

        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("bi-eye");
        });

        toggleConfirmPassword.addEventListener("click", function () {
            const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
            confirmPassword.setAttribute("type", type);
            this.classList.toggle("bi-eye");
        });
    </script>
    <!-- / Masukkan Script tambahan disini -->
@endpush
