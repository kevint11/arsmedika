@extends('layouts.app', ['active' => 'Dashboard'])
@section('title', 'Arsmedika - Asuransi Kesehatan')
@section('style')
    <!-- Masukkan Style Css tambahan disini -->

    <!-- / Masukkan Style Css tambahan disini -->
@endsection

@section('content')
    <!-- Content -->
    
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile /</span> Ganti Password</h4>

    <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link" href="pages-account-settings-notifications.html"
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
              <form id="formAccountSettings" method="POST" onsubmit="return false">
                <div class="row">
                  <div class="mb-3 col-md-12">
                    <label for="oldPassword" class="form-label">Password Lama</label>
                    <input
                      class="form-control"
                      type="password"
                      id="oldPassword"
                      name="oldPassword"
                      placeholder="Masukkan Password Lama Anda"
                      autofocus
                    />
                  </div>

                  <div class="mb-3 col-md-12">
                    <label for="password" class="form-label">Password Baru</label>
                    <input
                      class="form-control"
                      type="password"
                      id="password"
                      name="password"
                      placeholder="Password Baru Anda"
                      autofocus
                    />
                  </div>

                  <div class="mb-3 col-md-12">
                    <label for="confirmPassword" class="form-label">Konfirmasi Password Baru</label>
                    <input
                      class="form-control"
                      type="password"
                      id="confirmPassword"
                      name="confirmPassword"
                      placeholder="Konfirmasi Password Baru Anda"
                      autofocus
                    />
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
    </script>
    <!-- / Masukkan Script tambahan disini -->
@endpush
