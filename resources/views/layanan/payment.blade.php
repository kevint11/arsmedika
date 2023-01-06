  @include('layouts.style')
  <title>Pembayaran</title>
  
  <!-- Masukkan Style Css tambahan disini -->

  <!-- / Masukkan Style Css tambahan disini -->
  </head>

  @include('layouts.header')
  @include('layouts.navbar')

  <!-- Content wrapper -->
  <div class="content-wrapper">
    @if($errors->any())
      {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Layanan /</span> Pembayaran</h4>
      
      <form method="POST" action="{{ route('Konfirmasi Pembayaran') }}">
        @csrf
      <div class="card mb-4">
        <h5 class="card-header">Detail Umum</h5>
        <div class="card-body">
          <div class="mb-3 row">
            <label for="nik_id" class="col-md-2 col-form-label">NIK Pasien</label>
            <div class="col-md-10">
              <input name="nik_id" class="form-control" type="number" placeholder="12xxxxxxxxxxx" id="nik_id" value="12233300004444" required/>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="faktur" class="col-md-2 col-form-label">Kode Pembayaran</label>
            <div class="col-md-10">
              <input name="kode_kwitansi" class="form-control" type="text" placeholder="FK 01234" id="faktur" value="NEW 001" required/>
            </div>
          </div>
          
          <div class="mb-3 row">
            <label for="start_date" class="col-md-2 col-form-label">Tanggal Dirawat</label>
            <div class="col-md-10">
              <input name="start_date" class="form-control datepicker" type="text" placeholder="Mulai Dirawat" value="2011-11-11" id="start_date" required/>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="end_date" class="col-md-2 col-form-label"> </label>
            <div class="col-md-10">
              <input name="end_date" class="form-control datepicker" type="text" placeholder="Akhir Dirawat" value="2012-12-12" id="end_date" required/>
            </div>
          </div>
        </div>

        <hr class="my-0" /> <br>
        <h5 class="card-header">Detail Tagihan</h5>
        <div class="card-body">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="kamar" class="form-label">Biaya kamar pasien</label>
              <input
                class="form-control"
                type="text"
                id="kamar"
                name="RIKAM"
                placeholder="Rp. "
                autofocus
              />
            </div>
            <div class="mb-3 col-md-6">
              <label for="kamar_jlh" class="form-label">Jumlah Hari</label>
              <input class="form-control" type="text" name="qRIKAM" placeholder="0" id="kamar_jlh" />
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="dokumum" class="form-label">Kunjungan Dokter Umum</label>
              <input
                class="form-control"
                type="text"
                id="dokumum"
                name="RIKDU"
                placeholder="Rp. "
                autofocus
              />
            </div>
            <div class="mb-3 col-md-6">
              <label for="dokumum_jlh" class="form-label">Jumlah Kunjungan</label>
              <input class="form-control" type="text" name="qRIKDU" placeholder="0" id="dokumum_jlh" />
            </div>
          </div>
          
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="dokspes" class="form-label">Kunjungan Dokter Spesialis</label>
              <input
                class="form-control"
                type="text"
                id="dokspes"
                name="RIKDS"
                placeholder="Rp. "
                autofocus
              />
            </div>
            <div class="mb-3 col-md-6">
              <label for="dokspes_jlh" class="form-label">Jumlah Kunjungan</label>
              <input class="form-control" type="text" name="qRIKDS" placeholder="0" id="dokspes_jlh" />
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="icu" class="form-label">ICU/NICCU</label>
              <input
                class="form-control"
                type="text"
                id="icu"
                name="RIICU"
                placeholder="Rp. "
                autofocus
              />
            </div>
            <div class="mb-3 col-md-6">
              <label for="icu_jlh" class="form-label">Jumlah Hari</label>
              <input class="form-control" type="text" name="qRIICU" placeholder="0" id="icu_jlh" />
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="opkecil" class="form-label">Pembedahan operasi kecil</label>
              <input
                class="form-control"
                type="text"
                id="opkecil"
                name="RIPOK"
                placeholder="Rp. "
                autofocus
              />
            </div>
            <div class="mb-3 col-md-6">
              <label for="opkecil_jlh" class="form-label">Jumlah Operasi</label>
              <input class="form-control" type="text" name="qRIPOK" placeholder="0" id="opkecil_jlh" />
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="opbesar" class="form-label">Pembedahan operasi besar</label>
              <input
                class="form-control"
                type="text"
                id="opbesar"
                name="RIPOB"
                placeholder="Rp. "
                autofocus
              />
            </div>
            <div class="mb-3 col-md-6">
              <label for="opbesar_jlh" class="form-label">Jumlah Operasi</label>
              <input class="form-control" type="text" name="qRIPOB" placeholder="0" id="opbesar_jlh" />
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="ambulan" class="form-label">Ambulance</label>
              <input
                class="form-control"
                type="text"
                id="ambulan"
                name="RIAMB"
                placeholder="Rp. "
                autofocus
              />
            </div>
            <div class="mb-3 col-md-6">
              <label for="ambulan_jlh" class="form-label">Jumlah Kejadian</label>
              <input class="form-control" type="text" name="qRIAMB" placeholder="0" id="ambulan_jlh" />
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="aneka" class="form-label">Aneka perawatan rumah sakit</label>
              <input
                class="form-control"
                type="text"
                id="aneka"
                name="RIANK"
                placeholder="Rp. "
                autofocus
              />
            </div>
            {{-- <div class="mb-3 col-md-6">
              <label for="aneka_jlh" class="form-label">Jumlah Hari</label>
              <input class="form-control" type="text" name="qRIANK" placeholder="0" id="aneka_jlh" />
            </div> --}}
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="tes" class="form-label">Test diagnostik atau laboratorium</label>
              <input
                class="form-control"
                type="text"
                id="tes"
                name="RILAB"
                placeholder="Rp. "
                autofocus
              />
            </div>
            {{-- <div class="mb-3 col-md-6">
              <label for="tes_jlh" class="form-label">Jumlah Test</label>
              <input class="form-control" type="text" name="qRILAB" placeholder="0" id="tes_jlh" />
            </div> --}}
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="obat" class="form-label">Obat-obatan</label>
              <input
                class="form-control"
                type="text"
                id="obat"
                name="RIOBT"
                placeholder="Rp. "
                autofocus
              />
            </div>
            {{-- <div class="mb-3 col-md-6">
              <label for="obat_jlh" class="form-label">Jumlah Jenis Obat</label>
              <input class="form-control" type="text" name="qRIOBT" placeholder="0" id="obat_jlh" />
            </div> --}}
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="premi" class="form-label">Premi</label>
              <input
                class="form-control"
                type="text"
                id="premi"
                name="PREMI"
                placeholder="Rp. "
                autofocus
              />
            </div>
            {{-- <div class="mb-3 col-md-6">
              <label for="premi_jlh" class="form-label">Jumlah kali</label>
              <input class="form-control" type="text" name="qPREMI" placeholder="0" id="premi_jlh" />
            </div> --}}
          </div>
          {{-- <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Aneka perawatan rumah sakit</label>
            <div class="col-md-4">
              <input name="RIKAM" class="form-control" type="text" placeholder="Rp. " id="html5-text-input" />
            </div>
            <label for="html5-text-input" class="col-md-2 col-form-label">Hari kamar</label>
            <div class="col-md-4">
              <input name="RIKAM" class="form-control" type="text" placeholder="0" id="html5-text-input" />
            </div>
          </div> --}}
           <br>
          <div class="mt-2">
            <button type="reset" class="btn btn-outline-secondary">Batal</button>
            <button type="submit" style="float: right;" class="btn btn-primary">Kirim</button>
          </div>
        </div>
      </div>
    </form>
    </div>
    <!-- / Content -->

    @include('layouts.footer')
    <!-- Masukkan Script tambahan disini -->
    <script>

      $(".datepicker").datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true
      });
  
  </script>

    <!-- / Masukkan Script tambahan disini -->
    @include('layouts.script')
  </body>
</html>
