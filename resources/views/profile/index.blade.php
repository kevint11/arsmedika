  @include('layouts.style')
  
<title>Arsmedika - Asuransi Kesehatan</title>
  
  <!-- Masukkan Style Css tambahan disini -->

  <!-- / Masukkan Style Css tambahan disini -->
  </head>

  @include('layouts.header')
  @include('layouts.navbar')

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-lg-8 mb-4 order-0">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-primary">Selamat datang {{ Auth::user()->biodata->nama }}! 🎉</h5>
                  <p class="mb-4">
                    Berhasil masuk. Progress sistem masih <span class="fw-bold">3%</span>.
                  </p>

                  </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- / Content -->

    @include('layouts.footer')
    <!-- Masukkan Script tambahan disini -->

    <!-- / Masukkan Script tambahan disini -->
    @include('layouts.script')
  </body>
</html>
