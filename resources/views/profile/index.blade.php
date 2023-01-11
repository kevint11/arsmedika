@extends('layouts.app', ['active' => 'Dashboard'])
@section('title', 'Arsmedika - Asuransi Kesehatan')
@section('style')
    <!-- Masukkan Style Css tambahan disini -->

    <!-- / Masukkan Style Css tambahan disini -->
@endsection

@section('content')
    <!-- Content -->

    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat datang {{ Auth::user()->biodata->nama }}! 🎉</h5>
                            <p class="mb-4">
                                Berhasil masuk. Progress sistem masih <span class="fw-bold">16%</span>.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
<!-- / Content -->

@push('script')
    <!-- Masukkan Script tambahan disini -->

    <!-- / Masukkan Script tambahan disini -->
@endpush
