<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('kelas');
            $table->string('nama');
            $table->unsignedInteger('batas');
            $table->unsignedBigInteger('harga');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('kartu_pasien', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nik_id');
            $table->string('kelas');
            $table->date('tanggal_aktif');
            $table->date('tanggal_kadaluarsa');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('saldo_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('kartu_id');
            $table->string('layanan_id');
            $table->string('kode_layanan');
            $table->unsignedBigInteger('pembayaran');
            $table->unsignedBigInteger('sisa_saldo');
            $table->unsignedInteger('penggunaan');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('history_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('saldo_id');
            $table->string('detail_id');
            $table->unsignedBigInteger('pembayaran');
            $table->unsignedBigInteger('potongan_saldo');
            $table->unsignedBigInteger('sisa_saldo');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pembayaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kartu_id');
            $table->string('kode_kwitansi');
            $table->unsignedBigInteger('total_biaya');
            $table->unsignedBigInteger('total_potongan');
            $table->unsignedBigInteger('biaya_akhir');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('detail_pembayaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pembayaran_id');
            $table->string('kode_layanan');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('biaya');
            $table->unsignedBigInteger('potongan_harga');
            $table->unsignedBigInteger('biaya_akhir');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('data_pasien', function (Blueprint $table) {
            $table->string('nik')->unique()->primary();
            $table->string('user_id')->unique();
            $table->string('nama');
            $table->string('jenis_kelamin')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layanan');
        Schema::dropIfExists('kartu_pasien');
        Schema::dropIfExists('data_pasien');
        Schema::dropIfExists('saldo_layanan');
        Schema::dropIfExists('pembayaran');
    }
}
