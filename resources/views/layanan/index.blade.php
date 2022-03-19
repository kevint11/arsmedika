  @include('layouts.style')
  <title>Layanan</title>
  
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
      <div class="col-8">
      </div>
      <div class="col-4">
        <div class="input-group">
          <select
            class="form-select"
            id="inputGroupSelect04"
            aria-label="Example select with button addon"
          >
            <option value="" selected>Pilih kelas...</option>
            <option value="PM-100">PM-100</option>
            <option value="PM-200">PM-200</option>
            <option value="PM-400">PM-400</option>
            <option value="PM-800">PM-800</option>
          </select>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
      <!-- Hoverable Table rows -->
      <div class="card">
        <h5 class="card-header">Daftar Layanan</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-hover" id="myTable">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama Layanan</th>
                <th>Penggunaan</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="layanan">
              <?php 
                foreach ($layanan as $q) {
                  echo "<tr> <td>" . $q->kode . " (" . $q->kelas .
                    ") </td> <td>"  . $q->nama .
                    "</td> <td>"  . $q->batas_penggunaan . " " .  $q->satuan_penggunaan .
                    "</td> <td>"  . $q->harga .
                    "</td> </tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Hoverable Table rows -->
    </div>
    </div>
    </div>
    <!-- / Content -->

    @include('layouts.footer')
    <!-- Masukkan Script tambahan disini -->
    <script type="text/javascript">
      const layanan = <?php echo json_encode($layanan); ?>;
      // var layanan = jQuery.parseJSON(data);
      
      $("#inputGroupSelect04").change(function(){
        var content = '';
        for (var i = 0; i < layanan.length; i++) {
          if(layanan[i].kelas == $(this).val()){
            content += '<tr id="' + layanan[i].id + '">';
            content += '<td>' + layanan[i].kode + '</td>';
            content += '<td>' + layanan[i].nama + '</td>';
            content += '<td>' + layanan[i].batas_penggunaan + ' ' + layanan[i].satuan_penggunaan + '</td>';
            content += '<td>' + layanan[i].harga + '</td>';
            content += '</tr>';
          } else if($(this).val() == '') {
            content += '<tr id="' + layanan[i].id + '">';
            content += '<td>' + layanan[i].kode + ' (' + layanan[i].kelas +') </td>';
            content += '<td>' + layanan[i].nama + '</td>';
            content += '<td>' + layanan[i].batas_penggunaan + ' ' + layanan[i].satuan_penggunaan + '</td>';
            content += '<td>' + layanan[i].harga + '</td>';
            content += '</tr>';
          } 
        }
        $('#myTable tbody').html(content);
      });
    </script>

    <!-- / Masukkan Script tambahan disini -->
    @include('layouts.script')
  </body>
</html>
