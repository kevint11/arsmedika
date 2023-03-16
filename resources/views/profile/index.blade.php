@extends('layouts.app', ['active' => 'Dashboard'])
@section('title', 'Arsmedika - Asuransi Kesehatan')
@section('style')
    <!-- Masukkan Style Css tambahan disini -->

    <!-- / Masukkan Style Css tambahan disini -->
@endsection

@section('content')
    <!-- Content -->
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile /</span> Dashboard</h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-bell me-1"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Ganti Password') }}">
                        <i class="bx bx-user me-1"></i> Password</a>
                </li>
            </ul>
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            {{-- <img width="500" src="{{ asset('storage/app/uploads/bukti_struk/1678867135_7e19efe2e45e4c629def8cf7da317b6f.jpg') }}" alt=""> --}}
                            <h5 class="card-title text-primary">Selamat datang {{ Auth::user()->biodata->nama }}! 🏥</h5>
                            @if (session('status'))
                                <h3 class="card-title text-success">    {{ session('status') }} </h3>
                            @endif
                            <p class="mb-4">
                                Progress pengembangan sistem : <span class="fw-bold text-info">70%</span>.
                            </p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            @if (Auth::user()->nik_id == null)
                <form method="POST" action="{{ route('Data Kartu') }}">
                    <div class="row">
                        <div class="col-12 mb-4 order-0">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-10 pb-3">
                                        <h5 class="card-header mb-3">Silahkan lengkapi data anda terlebih dahulu.</h5>
                                        <div class="card-body">
                                            <div class="mb-3 row">
                                                <label for="nik" class="col-md-2 col-form-label">NIK</label>
                                                <div class="col-md-10">
                                                    <input name="nik_id" class="form-control" type="text"
                                                        placeholder="NIK Anda" id="nik" required />
                                                    @error('nik_id')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="jenis_kelamin" class="col-md-2 col-form-label">Jenis
                                                    Kelamin</label>
                                                <div class="col-md-10">
                                                    <select id="jenis_kelamin" class="form-control" name="jenis_kelamin"
                                                        required>
                                                        <option selected disabled> Jenis Kelamin Anda </option>
                                                        <option value="Laki-laki">Laki-Laki</option>
                                                        <option value="Wanita">Wanita</option>
                                                    </select>
                                                    @error('jenis_kelamin')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="tempat_lahir" class="col-md-2 col-form-label">Tempat
                                                    Lahir</label>
                                                <div class="col-md-10">
                                                    <input name="tempat_lahir" class="form-control" type="text"
                                                        placeholder="Tempat Lahir Anda" id="tempat_lahir" required />
                                                    @error('tempat_lahir')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="tanggal_lahir" class="col-md-2 col-form-label">Tanggal
                                                    Lahir</label>
                                                <div class="col-md-10">
                                                    <input name="tanggal_lahir" class="form-control datepicker"
                                                        type="text" placeholder="Tanggal Lahir Anda" id="tanggal_lahir"
                                                        required />
                                                    @error('tanggal_lahir')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-4 order-0">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-10 pb-3">
                                        <h5 class="card-header mb-3">Lalu pilih kelas asuransi anda.</h5>
                                        <div class="card-body">
                                            @csrf
                                            <div class="mb-3 row">
                                                <label for="kelas" class="col-md-2 col-form-label">Pilih Kelas</label>
                                                <div class="col-md-10">
                                                    <select id="kelas" class="form-control" name="kelas">
                                                        <option selected disabled> Kelas Asuransi </option>
                                                        <option value="PM-100">PM-100</option>
                                                        <option value="PM-200">PM-200</option>
                                                        <option value="PM-400">PM-400</option>
                                                        <option value="PM-800">PM-800</option>
                                                    </select>
                                                    @error('kelas')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="faktur" class="col-md-2 col-form-label">Kode Unik
                                                    Pembayaran</label>
                                                <div class="col-md-10">
                                                    <input name="kode_pembayaran" class="form-control" type="text"
                                                        placeholder="Kode Pembayaran" id="faktur" value="RX FAF3 E6E2W"
                                                        required />
                                                    @error('kode_pembayaran')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" style="float: right;"
                                                    class="btn btn-primary">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @elseif (Auth::user()->status == 'Terdaftar')
                <div class="row">
                    <div class="col-12 mb-4 order-0">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-10 pb-3">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('Pilih Kelas') }}">
                                            @csrf
                                            <div class="mb-3 row">
                                                <label for="kelas" class="col-md-2 col-form-label">Pilih Kelas</label>
                                                <div class="col-md-10">
                                                    <select id="kelas" class="form-control" name="kelas">
                                                        <option selected disabled> Kelas Asuransi </option>
                                                        <option value="PM-100">PM-100</option>
                                                        <option value="PM-200">PM-200</option>
                                                        <option value="PM-400">PM-400</option>
                                                        <option value="PM-800">PM-800</option>
                                                    </select>
                                                    @error('kelas')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="faktur" class="col-md-2 col-form-label">Kode Unik
                                                    Pembayaran</label>
                                                <div class="col-md-10">
                                                    <input name="kode_pembayaran" class="form-control" type="text"
                                                        placeholder="Kode Pembayaran" id="faktur"
                                                        value="RX FAF3 E6E2W" required />
                                                    @error('kode_pembayaran')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" style="float: right;"
                                                    class="btn btn-primary">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
