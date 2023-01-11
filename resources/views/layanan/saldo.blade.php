@extends('layouts.app', ['active' => 'Layanan'])
@section('title', 'Layanan')
@section('style')
    <!-- Masukkan Style Css tambahan disini -->

    <!-- / Masukkan Style Css tambahan disini -->
@endsection

@section('content')
    <!-- Content -->

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Layanan /</span> Detail Asuransi</h4>

    <div class="row">
        <div class="col-8">
        </div>
        <div class="col-4">

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header">Arsmedika</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Layanan</th>
                                <th>Penggunaan</th>
                                <th>Saldo Awal</th>
                                <th>Sisa Saldo </th>
                                <th>Banyak Penggunaan</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="layanan">

                            <?php
                            $limit['0'] = 'per-kejadian';
                            $limit['1'] = 'per-hari';
                            $limit['90'] = 'per-hari, maksimal 90 hari';
                            $limit['365'] = 'per-tahun';
                            
                            $satuan['0'] = ' kejadian';
                            $satuan['1'] = ' hari';
                            $satuan['90'] = ' hari';
                            $satuan['365'] = ' kali';
                            foreach ($layanan as $q) {
                                echo '<tr> <td>' . $q->namaLayanan->kode . 
                                    '</td> <td>' . $q->namaLayanan->nama . 
                                    '</td> <td>' . $limit[$q->namaLayanan->batas] . 
                                    '</td> <td>' . number_format($q->namaLayanan->harga, 2, ',', '.') . 
                                    '</td> <td>' . number_format($q->sisa_saldo, 2, ',', '.') . 
                                    '</td> <td>' . $q->penggunaan . $satuan[$q->namaLayanan->batas]. '</td> </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Hoverable Table rows -->
        </div>
    </div>
@endsection
<!-- / Content -->

@push('script')
    <!-- Masukkan Script tambahan disini -->

    <!-- / Masukkan Script tambahan disini -->
@endpush
