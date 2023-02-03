<?php

namespace Database\Seeders;

use App\Models\Config\Permission;
use App\Models\Config\Role;
use App\Models\DataPasien;
use App\Models\KartuPasien;
use App\Models\Layanan;
use App\Models\Roles;
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

        // Data Layanan Asuransi
        $a1 = Layanan::create([
            'kode'=>'RIKAM',
            'kelas'=>'PM-100',
            'nama'=>'Biaya kamar',
            'batas'=>90,
            'harga'=>100000
        ]);

        $a2 = Layanan::create([
            'kode'=>'RIKAM',
            'kelas'=>'PM-200',
            'nama'=>'Biaya kamar',
            'batas'=>90,
            'harga'=>200000
        ]);

        $a3 = Layanan::create([
            'kode'=>'RIKAM',
            'kelas'=>'PM-400',
            'nama'=>'Biaya kamar',
            'batas'=>90,
            'harga'=>400000
        ]);

        $a4 = Layanan::create([
            'kode'=>'RIKAM',
            'kelas'=>'PM-800',
            'nama'=>'Biaya kamar',
            'batas'=>90,
            'harga'=>800000
        ]);

        $b1 = Layanan::create([
            'kode'=>'RIKDU',
            'kelas'=>'PM-100',
            'nama'=>'Kunjungan dokter umum',
            'batas'=>1,
            'harga'=>50000
        ]);

        $b2 = Layanan::create([
            'kode'=>'RIKDU',
            'kelas'=>'PM-200',
            'nama'=>'Kunjungan dokter umum',
            'batas'=>1,
            'harga'=>60000
        ]);

        $b3 = Layanan::create([
            'kode'=>'RIKDU',
            'kelas'=>'PM-400',
            'nama'=>'Kunjungan dokter umum',
            'batas'=>1,
            'harga'=>70000
        ]);

        $b4 = Layanan::create([
            'kode'=>'RIKDU',
            'kelas'=>'PM-800',
            'nama'=>'Kunjungan dokter umum',
            'batas'=>1,
            'harga'=>80000
        ]);

        $c1 = Layanan::create([
            'kode'=>'RIKDS',
            'kelas'=>'PM-100',
            'nama'=>'Kunjungan dokter spesialis',
            'batas'=>1,
            'harga'=>80000
        ]);

        $c2 = Layanan::create([
            'kode'=>'RIKDS',
            'kelas'=>'PM-200',
            'nama'=>'Kunjungan dokter spesialis',
            'batas'=>1,
            'harga'=>100000
        ]);

        $c3 = Layanan::create([
            'kode'=>'RIKDS',
            'kelas'=>'PM-400',
            'nama'=>'Kunjungan dokter spesialis',
            'batas'=>1,
            'harga'=>135000
        ]);

        $c4 = Layanan::create([
            'kode'=>'RIKDS',
            'kelas'=>'PM-800',
            'nama'=>'Kunjungan dokter spesialis',
            'batas'=>1,
            'harga'=>200000
        ]);

        $d1 = Layanan::create([
            'kode'=>'RIICU',
            'kelas'=>'PM-100',
            'nama'=>'ICU/NICCU',
            'batas'=>90,
            'harga'=>150000
        ]);

        $d2 = Layanan::create([
            'kode'=>'RIICU',
            'kelas'=>'PM-200',
            'nama'=>'ICU/NICCU',
            'batas'=>90,
            'harga'=>300000
        ]);

        $d3 = Layanan::create([
            'kode'=>'RIICU',
            'kelas'=>'PM-400',
            'nama'=>'ICU/NICCU',
            'batas'=>90,
            'harga'=>600000
        ]);

        $d4 = Layanan::create([
            'kode'=>'RIICU',
            'kelas'=>'PM-800',
            'nama'=>'ICU/NICCU',
            'batas'=>90,
            'harga'=>1200000
        ]);

        $e1 = Layanan::create([
            'kode'=>'RIPOK',
            'kelas'=>'PM-100',
            'nama'=>'Pembedahan operasi kecil',
            'batas'=>0,
            'harga'=>1000000
        ]);

        $e2 = Layanan::create([
            'kode'=>'RIPOK',
            'kelas'=>'PM-200',
            'nama'=>'Pembedahan operasi kecil',
            'batas'=>0,
            'harga'=>2000000
        ]);

        $e3 = Layanan::create([
            'kode'=>'RIPOK',
            'kelas'=>'PM-400',
            'nama'=>'Pembedahan operasi kecil',
            'batas'=>0,
            'harga'=>4000000
        ]);

        $e4 = Layanan::create([
            'kode'=>'RIPOK',
            'kelas'=>'PM-800',
            'nama'=>'Pembedahan operasi kecil',
            'batas'=>0,
            'harga'=>8000000
        ]);

        $f1 = Layanan::create([
            'kode'=>'RIPOB',
            'kelas'=>'PM-100',
            'nama'=>'Pembedahan operasi besar',
            'batas'=>0,
            'harga'=>3000000
        ]);

        $f2 = Layanan::create([
            'kode'=>'RIPOB',
            'kelas'=>'PM-200',
            'nama'=>'Pembedahan operasi besar',
            'batas'=>0,
            'harga'=>6000000
        ]);

        $f3 = Layanan::create([
            'kode'=>'RIPOB',
            'kelas'=>'PM-400',
            'nama'=>'Pembedahan operasi besar',
            'batas'=>0,
            'harga'=>12000000
        ]);

        $f4 = Layanan::create([
            'kode'=>'RIPOB',
            'kelas'=>'PM-800',
            'nama'=>'Pembedahan operasi besar',
            'batas'=>0,
            'harga'=>24000000
        ]);

        $h1 = Layanan::create([
            'kode'=>'RIANK',
            'kelas'=>'PM-100',
            'nama'=>'Aneka perawatan rumah sakit',
            'batas'=>365,
            'harga'=>1000000
        ]);

        $h2 = Layanan::create([
            'kode'=>'RIANK',
            'kelas'=>'PM-200',
            'nama'=>'Aneka perawatan rumah sakit',
            'batas'=>365,
            'harga'=>2000000
        ]);

        $h3 = Layanan::create([
            'kode'=>'RIANK',
            'kelas'=>'PM-400',
            'nama'=>'Aneka perawatan rumah sakit',
            'batas'=>365,
            'harga'=>4000000
        ]);

        $h4 = Layanan::create([
            'kode'=>'RIANK',
            'kelas'=>'PM-800',
            'nama'=>'Aneka perawatan rumah sakit',
            'batas'=>365,
            'harga'=>8000000
        ]);

        $i1 = Layanan::create([
            'kode'=>'RIAMB',
            'kelas'=>'PM-100',
            'nama'=>'Ambulance',
            'batas'=>0,
            'harga'=>50000
        ]);

        $i2 = Layanan::create([
            'kode'=>'RIAMB',
            'kelas'=>'PM-200',
            'nama'=>'Ambulance',
            'batas'=>0,
            'harga'=>60000
        ]);

        $i3 = Layanan::create([
            'kode'=>'RIAMB',
            'kelas'=>'PM-400',
            'nama'=>'Ambulance',
            'batas'=>0,
            'harga'=>70000
        ]);

        $i4 = Layanan::create([
            'kode'=>'RIAMB',
            'kelas'=>'PM-800',
            'nama'=>'Ambulance',
            'batas'=>0,
            'harga'=>80000
        ]);

        $j1 = Layanan::create([
            'kode'=>'RILAB',
            'kelas'=>'PM-100',
            'nama'=>'Test diagnostik atau laboratorium',
            'batas'=>365,
            'harga'=>1000000
        ]);

        $j2 = Layanan::create([
            'kode'=>'RILAB',
            'kelas'=>'PM-200',
            'nama'=>'Test diagnostik atau laboratorium',
            'batas'=>365,
            'harga'=>2000000
        ]);

        $j3 = Layanan::create([
            'kode'=>'RILAB',
            'kelas'=>'PM-400',
            'nama'=>'Test diagnostik atau laboratorium',
            'batas'=>365,
            'harga'=>4000000
        ]);

        $j4 = Layanan::create([
            'kode'=>'RILAB',
            'kelas'=>'PM-800',
            'nama'=>'Test diagnostik atau laboratorium',
            'batas'=>365,
            'harga'=>8000000
        ]);

        $k1 = Layanan::create([
            'kode'=>'RIOBT',
            'kelas'=>'PM-100',
            'nama'=>'Obat-obatan',
            'batas'=>365,
            'harga'=>1000000
        ]);

        $k2 = Layanan::create([
            'kode'=>'RIOBT',
            'kelas'=>'PM-200',
            'nama'=>'Obat-obatan',
            'batas'=>365,
            'harga'=>2000000
        ]);

        $k3 = Layanan::create([
            'kode'=>'RIOBT',
            'kelas'=>'PM-400',
            'nama'=>'Obat-obatan',
            'batas'=>365,
            'harga'=>4000000
        ]);

        $k4 = Layanan::create([
            'kode'=>'RIOBT',
            'kelas'=>'PM-800',
            'nama'=>'Obat-obatan',
            'batas'=>365,
            'harga'=>8000000
        ]);

        $l1 = Layanan::create([
            'kode'=>'PREMIL',
            'kelas'=>'PM-100',
            'nama'=>'Premi - Pria',
            'batas'=>0,
            'harga'=>750000
        ]);

        $l2 = Layanan::create([
            'kode'=>'PREMIL',
            'kelas'=>'PM-200',
            'nama'=>'Premi - Pria',
            'batas'=>0,
            'harga'=>1250000
        ]);

        $l3 = Layanan::create([
            'kode'=>'PREMIL',
            'kelas'=>'PM-400',
            'nama'=>'Premi - Pria',
            'batas'=>0,
            'harga'=>1750000
        ]);

        $l4 = Layanan::create([
            'kode'=>'PREMIL',
            'kelas'=>'PM-800',
            'nama'=>'Premi - Pria',
            'batas'=>0,
            'harga'=>2450000
        ]);

        $m1 = Layanan::create([
            'kode'=>'PREMIW',
            'kelas'=>'PM-100',
            'nama'=>'Premi - Wanita',
            'batas'=>0,
            'harga'=>850000
        ]);

        $m2 = Layanan::create([
            'kode'=>'PREMIW',
            'kelas'=>'PM-200',
            'nama'=>'Premi - Wanita',
            'batas'=>0,
            'harga'=>1350000
        ]);

        $m3 = Layanan::create([
            'kode'=>'PREMIW',
            'kelas'=>'PM-400',
            'nama'=>'Premi - Wanita',
            'batas'=>0,
            'harga'=>2000000
        ]);

        $m4 = Layanan::create([
            'kode'=>'PREMIW',
            'kelas'=>'PM-800',
            'nama'=>'Premi - Wanita',
            'batas'=>0,
            'harga'=>2700000
        ]);

        $n1 = Layanan::create([
            'kode'=>'PREMIA',
            'kelas'=>'PM-100',
            'nama'=>'Premi - Anak dibawah 12 tahun',
            'batas'=>0,
            'harga'=>825000
        ]);

        $n2 = Layanan::create([
            'kode'=>'PREMIA',
            'kelas'=>'PM-200',
            'nama'=>'Premi - Anak dibawah 12 tahun',
            'batas'=>0,
            'harga'=>1300000
        ]);

        $n3 = Layanan::create([
            'kode'=>'PREMIA',
            'kelas'=>'PM-400',
            'nama'=>'Premi - Anak dibawah 12 tahun',
            'batas'=>0,
            'harga'=>1800000
        ]);

        $n4 = Layanan::create([
            'kode'=>'PREMIA',
            'kelas'=>'PM-800',
            'nama'=>'Premi - Anak dibawah 12 tahun',
            'batas'=>0,
            'harga'=>2500000
        ]);


        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Create all roles
        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        $userRole = Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        // Create all permissions
        $pembayaranPermission = Permission::updateOrCreate(
            ['name' => 'pembayaran'],
            ['guard_name' => 'web',
            'menu' => null,
        ]);
        $confirmPembayaranPermission = Permission::updateOrCreate(
            ['name' => 'confirmPembayaran'],
            ['guard_name' => 'web',
            'menu' => null,
        ]);
        $dashboardPermission = Permission::updateOrCreate(
            ['name' => 'dashboard'],
            ['guard_name' => 'web',
            'menu' => null,
        ]);
        $layananPermission = Permission::updateOrCreate(
            ['name' => 'layanan'],
            ['guard_name' => 'web',
            'menu' => null,
        ]);

        // Give permission to every role
        $userRole->givePermissionTo($dashboardPermission);
        $userRole->givePermissionTo($layananPermission);
        
        $adminRole->givePermissionTo($dashboardPermission);
        $adminRole->givePermissionTo($layananPermission);
        $adminRole->givePermissionTo($pembayaranPermission);
        $adminRole->givePermissionTo($confirmPembayaranPermission);


        // Akun Pasien dan Admin
        $user2 = User::create([
            'email'=>'admin@ars.com',
            'nik_id'=>'admin',
            'password'=>bcrypt('admin'),
            'status'=>'Aktif'
        ]);

        $user1 = User::create([
            'email'=>'pasien@ars.com',
            'nik_id'=>'12233300004444',
            'password'=>bcrypt('123123123'),
            'status'=>'Aktif'
        ]);

        $user3 = User::create([
            'email'=>'putri@ars.com',
            'nik_id'=>'123321123321',
            'password'=>bcrypt('123123123'),
            'status'=>'Diblokir'
        ]);
                

        // Data Pasien dan Admin
        $dpasien2 = DataPasien::create([
            'nik'=>'admin',
            'user_id'=>$user2->id,
            'nama'=>'Admin S.N',
            'jenis_kelamin'=>'Laki-laki',
            'tanggal_lahir'=>'1969-06-09',
            'tempat_lahir'=>'Sukamiskin',
        ]);

        $dpasien1 = DataPasien::create([
            'nik'=>'12233300004444',
            'user_id'=>$user1->id,
            'nama'=>'Pasien F.S',
            'jenis_kelamin'=>'Laki-laki',
            'tanggal_lahir'=>'1971-12-12',
            'tempat_lahir'=>'Lapas',
        ]);

        $dpasien3 = DataPasien::create([
            'nik'=>'123321123321',
            'user_id'=>$user3->id,
            'nama'=>'Putri Mirna',
            'jenis_kelamin'=>'Perempuan',
            'tanggal_lahir'=>'1974-04-25',
            'tempat_lahir'=>'Rutan',
        ]);

        // Assign user to role and permission
        $user2->assignRole('admin');
        $user1->assignRole('user');
        $user3->assignRole('user');

        // Kartu Pasien untuk Setiap Saldo Layanan
        $kpasien1 = KartuPasien::create([
            'nik_id'=>$dpasien1->nik,
            'kelas'=>'PM-400',
            'tanggal_aktif'=>'2021-12-12',
            'tanggal_kadaluarsa'=>'2024-12-24',
            'status'=>'Aktif'
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$a3->id,
            'kode_layanan'=>$a3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$a3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$b3->id,
            'kode_layanan'=>$b3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$b3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$c3->id,
            'kode_layanan'=>$c3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$c3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$d3->id,
            'kode_layanan'=>$d3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$d3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$e3->id,
            'kode_layanan'=>$e3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$e3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$f3->id,
            'kode_layanan'=>$f3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$f3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$h3->id,
            'kode_layanan'=>$h3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$h3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$i3->id,
            'kode_layanan'=>$i3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$i3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$j3->id,
            'kode_layanan'=>$j3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$j3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$k3->id,
            'kode_layanan'=>$k3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$k3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$l3->id,
            'kode_layanan'=>$l3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$l3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$m3->id,
            'kode_layanan'=>$m3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$m3->harga,
            'penggunaan'=>0
        ]);

        $spasien1 = SaldoLayanan::create([
            'kartu_id'=>$kpasien1->id,
            'layanan_id'=>$n3->id,
            'kode_layanan'=>$n3->nama,
            'pembayaran'=>0,
            'sisa_saldo'=>$n3->harga,
            'penggunaan'=>0
        ]);

        //  $user1->givePermissionTo('dashboard');
        //  $user1->givePermissionTo('layanan');
        //  $user2->givePermissionTo('dashboard');
        //  $user2->givePermissionTo('layanan');
        //  $user2->givePermissionTo('pembayaran');
        //  $user2->givePermissionTo('confirmPembayaran');

    }
}
