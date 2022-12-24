<?php

namespace Database\Seeders;

use App\Models\DataPasien;
use App\Models\KartuPasien;
use App\Models\Layanan;
use App\Models\SaldoLayanan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $a1 = Layanan::create([
            'kode'=>'RIKAM',
            'kelas'=>'PM-100',
            'nama'=>'Biaya kamar',
            'batas_penggunaan'=>90,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>100000
        ]);

        $a2 = Layanan::create([
            'kode'=>'RIKAM',
            'kelas'=>'PM-200',
            'nama'=>'Biaya kamar',
            'batas_penggunaan'=>90,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>200000
        ]);

        $a3 = Layanan::create([
            'kode'=>'RIKAM',
            'kelas'=>'PM-400',
            'nama'=>'Biaya kamar',
            'batas_penggunaan'=>90,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>400000
        ]);

        $a4 = Layanan::create([
            'kode'=>'RIKAM',
            'kelas'=>'PM-800',
            'nama'=>'Biaya kamar',
            'batas_penggunaan'=>90,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>800000
        ]);

        $b1 = Layanan::create([
            'kode'=>'RIKDU',
            'kelas'=>'PM-100',
            'nama'=>'Kunjungan dokter umum',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>50000
        ]);

        $b2 = Layanan::create([
            'kode'=>'RIKDU',
            'kelas'=>'PM-200',
            'nama'=>'Kunjungan dokter umum',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>60000
        ]);

        $b3 = Layanan::create([
            'kode'=>'RIKDU',
            'kelas'=>'PM-400',
            'nama'=>'Kunjungan dokter umum',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>70000
        ]);

        $b4 = Layanan::create([
            'kode'=>'RIKDU',
            'kelas'=>'PM-800',
            'nama'=>'Kunjungan dokter umum',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>80000
        ]);

        $c1 = Layanan::create([
            'kode'=>'RIKDS',
            'kelas'=>'PM-100',
            'nama'=>'Kunjungan dokter spesialis',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>80000
        ]);

        $c2 = Layanan::create([
            'kode'=>'RIKDS',
            'kelas'=>'PM-200',
            'nama'=>'Kunjungan dokter spesialis',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>100000
        ]);

        $c3 = Layanan::create([
            'kode'=>'RIKDS',
            'kelas'=>'PM-400',
            'nama'=>'Kunjungan dokter spesialis',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>135000
        ]);

        $c4 = Layanan::create([
            'kode'=>'RIKDS',
            'kelas'=>'PM-800',
            'nama'=>'Kunjungan dokter spesialis',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>200000
        ]);

        $d1 = Layanan::create([
            'kode'=>'RIICU',
            'kelas'=>'PM-100',
            'nama'=>'ICU/NICCU',
            'batas_penggunaan'=>90,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>150000
        ]);

        $d2 = Layanan::create([
            'kode'=>'RIICU',
            'kelas'=>'PM-200',
            'nama'=>'ICU/NICCU',
            'batas_penggunaan'=>90,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>300000
        ]);

        $d3 = Layanan::create([
            'kode'=>'RIICU',
            'kelas'=>'PM-400',
            'nama'=>'ICU/NICCU',
            'batas_penggunaan'=>90,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>600000
        ]);

        $d4 = Layanan::create([
            'kode'=>'RIICU',
            'kelas'=>'PM-800',
            'nama'=>'ICU/NICCU',
            'batas_penggunaan'=>90,
            'satuan_penggunaan'=>'per-hari',
            'harga'=>1200000
        ]);

        $e1 = Layanan::create([
            'kode'=>'RIPOK',
            'kelas'=>'PM-100',
            'nama'=>'Pembedahan operasi kecil',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-operasi',
            'harga'=>1000000
        ]);

        $e2 = Layanan::create([
            'kode'=>'RIPOK',
            'kelas'=>'PM-200',
            'nama'=>'Pembedahan operasi kecil',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-operasi',
            'harga'=>2000000
        ]);

        $e3 = Layanan::create([
            'kode'=>'RIPOK',
            'kelas'=>'PM-400',
            'nama'=>'Pembedahan operasi kecil',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-operasi',
            'harga'=>4000000
        ]);

        $e4 = Layanan::create([
            'kode'=>'RIPOK',
            'kelas'=>'PM-800',
            'nama'=>'Pembedahan operasi kecil',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-operasi',
            'harga'=>8000000
        ]);

        $f1 = Layanan::create([
            'kode'=>'RIPOB',
            'kelas'=>'PM-100',
            'nama'=>'Pembedahan operasi besar',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-operasi',
            'harga'=>3000000
        ]);

        $f2 = Layanan::create([
            'kode'=>'RIPOB',
            'kelas'=>'PM-200',
            'nama'=>'Pembedahan operasi besar',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-operasi',
            'harga'=>6000000
        ]);

        $f3 = Layanan::create([
            'kode'=>'RIPOB',
            'kelas'=>'PM-400',
            'nama'=>'Pembedahan operasi besar',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-operasi',
            'harga'=>12000000
        ]);

        $f4 = Layanan::create([
            'kode'=>'RIPOB',
            'kelas'=>'PM-800',
            'nama'=>'Pembedahan operasi besar',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-operasi',
            'harga'=>24000000
        ]);

        $h1 = Layanan::create([
            'kode'=>'RIANK',
            'kelas'=>'PM-100',
            'nama'=>'Aneka perawatan rumah sakit',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>1000000
        ]);

        $h2 = Layanan::create([
            'kode'=>'RIANK',
            'kelas'=>'PM-200',
            'nama'=>'Aneka perawatan rumah sakit',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>2000000
        ]);

        $h3 = Layanan::create([
            'kode'=>'RIANK',
            'kelas'=>'PM-400',
            'nama'=>'Aneka perawatan rumah sakit',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>4000000
        ]);

        $h4 = Layanan::create([
            'kode'=>'RIANK',
            'kelas'=>'PM-800',
            'nama'=>'Aneka perawatan rumah sakit',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>8000000
        ]);

        $i1 = Layanan::create([
            'kode'=>'RIAMB',
            'kelas'=>'PM-100',
            'nama'=>'Ambulance',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kejadian',
            'harga'=>50000
        ]);

        $i2 = Layanan::create([
            'kode'=>'RIAMB',
            'kelas'=>'PM-200',
            'nama'=>'Ambulance',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kejadian',
            'harga'=>60000
        ]);

        $i3 = Layanan::create([
            'kode'=>'RIAMB',
            'kelas'=>'PM-400',
            'nama'=>'Ambulance',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kejadian',
            'harga'=>70000
        ]);

        $i4 = Layanan::create([
            'kode'=>'RIAMB',
            'kelas'=>'PM-800',
            'nama'=>'Ambulance',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kejadian',
            'harga'=>80000
        ]);

        $j1 = Layanan::create([
            'kode'=>'RILAB',
            'kelas'=>'PM-100',
            'nama'=>'Test diagnostik atau laboratorium',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>1000000
        ]);

        $j2 = Layanan::create([
            'kode'=>'RILAB',
            'kelas'=>'PM-200',
            'nama'=>'Test diagnostik atau laboratorium',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>2000000
        ]);

        $j3 = Layanan::create([
            'kode'=>'RILAB',
            'kelas'=>'PM-400',
            'nama'=>'Test diagnostik atau laboratorium',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>4000000
        ]);

        $j4 = Layanan::create([
            'kode'=>'RILAB',
            'kelas'=>'PM-800',
            'nama'=>'Test diagnostik atau laboratorium',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>8000000
        ]);

        $k1 = Layanan::create([
            'kode'=>'RIOBT',
            'kelas'=>'PM-100',
            'nama'=>'Obat-obatan',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>1000000
        ]);

        $k2 = Layanan::create([
            'kode'=>'RIOBT',
            'kelas'=>'PM-200',
            'nama'=>'Obat-obatan',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>2000000
        ]);

        $k3 = Layanan::create([
            'kode'=>'RIOBT',
            'kelas'=>'PM-400',
            'nama'=>'Obat-obatan',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>4000000
        ]);

        $k4 = Layanan::create([
            'kode'=>'RIOBT',
            'kelas'=>'PM-800',
            'nama'=>'Obat-obatan',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-tahun',
            'harga'=>8000000
        ]);

        $l1 = Layanan::create([
            'kode'=>'PREMIL',
            'kelas'=>'PM-100',
            'nama'=>'Premi - Pria',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>750000
        ]);

        $l2 = Layanan::create([
            'kode'=>'PREMIL',
            'kelas'=>'PM-200',
            'nama'=>'Premi - Pria',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>1250000
        ]);

        $l3 = Layanan::create([
            'kode'=>'PREMIL',
            'kelas'=>'PM-400',
            'nama'=>'Premi - Pria',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>1750000
        ]);

        $l4 = Layanan::create([
            'kode'=>'PREMIL',
            'kelas'=>'PM-800',
            'nama'=>'Premi - Pria',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>2450000
        ]);

        $m1 = Layanan::create([
            'kode'=>'PREMIW',
            'kelas'=>'PM-100',
            'nama'=>'Premi - Wanita',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>850000
        ]);

        $m2 = Layanan::create([
            'kode'=>'PREMIW',
            'kelas'=>'PM-200',
            'nama'=>'Premi - Wanita',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>1350000
        ]);

        $m3 = Layanan::create([
            'kode'=>'PREMIW',
            'kelas'=>'PM-400',
            'nama'=>'Premi - Wanita',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>2000000
        ]);

        $m4 = Layanan::create([
            'kode'=>'PREMIW',
            'kelas'=>'PM-800',
            'nama'=>'Premi - Wanita',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>2700000
        ]);

        $n1 = Layanan::create([
            'kode'=>'PREMIA',
            'kelas'=>'PM-100',
            'nama'=>'Premi - Anak dibawah 12 tahun',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>825000
        ]);

        $n2 = Layanan::create([
            'kode'=>'PREMIA',
            'kelas'=>'PM-200',
            'nama'=>'Premi - Anak dibawah 12 tahun',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>1300000
        ]);

        $n3 = Layanan::create([
            'kode'=>'PREMIA',
            'kelas'=>'PM-400',
            'nama'=>'Premi - Anak dibawah 12 tahun',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>1800000
        ]);

        $n4 = Layanan::create([
            'kode'=>'PREMIA',
            'kelas'=>'PM-800',
            'nama'=>'Premi - Anak dibawah 12 tahun',
            'batas_penggunaan'=>1,
            'satuan_penggunaan'=>'per-kali',
            'harga'=>2500000
        ]);

        $dpasien1 = DataPasien::create([
            'nik'=>'12233300004444',
            'nama'=>'Kevin F.S',
            'jenis_kelamin'=>'Laki-laki',
            'tanggal_lahir'=>'1997-12-11',
            'tempat_lahir'=>'Medan'
            'email'=>'aaa@as.com',
        ]);

        $user1 = User::create([
            'nik_id'=>$dpasien1->nik,
            'password'=>'123123123',
            'status'=>'Aktif'
        ]);

        $kpasien1 = KartuPasien::create([
            'nik_id'=>$dpasien1->nik,
            'kelas'=>'PM-400',
            'tanggal_aktif'=>'2021-12-12',
            'tanggal_kadaluarsa'=>'2024-12-24',
            'status'=>'Aktif'
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$a3->id,
            'nama_layanan'=>$a3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$a3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$b3->id,
            'nama_layanan'=>$b3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$b3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$c3->id,
            'nama_layanan'=>$c3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$c3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$d3->id,
            'nama_layanan'=>$d3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$d3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$e3->id,
            'nama_layanan'=>$e3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$e3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$f3->id,
            'nama_layanan'=>$f3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$f3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$h3->id,
            'nama_layanan'=>$h3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$h3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$i3->id,
            'nama_layanan'=>$i3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$i3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$j3->id,
            'nama_layanan'=>$j3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$j3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$k3->id,
            'nama_layanan'=>$k3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$k3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$l3->id,
            'nama_layanan'=>$l3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$l3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$m3->id,
            'nama_layanan'=>$m3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$m3->harga,
            'penggunaan'=>1
        ]);

        $spasien1 = SaldoLayanan::create([
            'nik_id'=>$dpasien1->nik,
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$n3->id,
            'nama_layanan'=>$n3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$n3->harga,
            'penggunaan'=>1
        ]);

    }
}
